import React, { useState, useEffect, useCallback, useRef } from 'react';

const GRID_SIZE = 15;
const INITIAL_SNAKE = [[7, 7]];
const INITIAL_DIRECTION = [0, -1];
const SPEED = 150;

const NeonSnake = () => {
    const [snake, setSnake] = useState(INITIAL_SNAKE);
    const [direction, setDirection] = useState(INITIAL_DIRECTION);
    const [food, setFood] = useState([5, 5]);
    const [gameOver, setGameOver] = useState(false);
    const [score, setScore] = useState(0);
    const [isPlaying, setIsPlaying] = useState(false);
    
    // Ref to handle rapid key presses
    const dirRef = useRef(INITIAL_DIRECTION);

    const generateFood = useCallback(() => {
        let newFood;
        while (true) {
            newFood = [
                Math.floor(Math.random() * GRID_SIZE),
                Math.floor(Math.random() * GRID_SIZE)
            ];
            // Pastikan makanan tidak muncul di tubuh snake
            if (!snake.some(segment => segment[0] === newFood[0] && segment[1] === newFood[1])) {
                break;
            }
        }
        return newFood;
    }, [snake]);

    const resetGame = () => {
        setSnake(INITIAL_SNAKE);
        setDirection(INITIAL_DIRECTION);
        dirRef.current = INITIAL_DIRECTION;
        setFood(generateFood());
        setGameOver(false);
        setScore(0);
        setIsPlaying(true);
    };

    useEffect(() => {
        const handleKeyDown = (e) => {
            if (!isPlaying) return;
            switch (e.key) {
                case 'ArrowUp':
                case 'w':
                    if (dirRef.current[1] !== 1) dirRef.current = [0, -1];
                    break;
                case 'ArrowDown':
                case 's':
                    if (dirRef.current[1] !== -1) dirRef.current = [0, 1];
                    break;
                case 'ArrowLeft':
                case 'a':
                    if (dirRef.current[0] !== 1) dirRef.current = [-1, 0];
                    break;
                case 'ArrowRight':
                case 'd':
                    if (dirRef.current[0] !== -1) dirRef.current = [1, 0];
                    break;
                default:
                    break;
            }
        };
        window.addEventListener('keydown', handleKeyDown);
        return () => window.removeEventListener('keydown', handleKeyDown);
    }, [isPlaying]);

    useEffect(() => {
        if (gameOver || !isPlaying) return;

        const moveSnake = setInterval(() => {
            setSnake((prevSnake) => {
                const newHead = [
                    prevSnake[0][0] + dirRef.current[0],
                    prevSnake[0][1] + dirRef.current[1]
                ];

                // Hit wall
                if (
                    newHead[0] < 0 || newHead[0] >= GRID_SIZE ||
                    newHead[1] < 0 || newHead[1] >= GRID_SIZE
                ) {
                    setGameOver(true);
                    setIsPlaying(false);
                    return prevSnake;
                }

                // Hit self
                if (prevSnake.some(segment => segment[0] === newHead[0] && segment[1] === newHead[1])) {
                    setGameOver(true);
                    setIsPlaying(false);
                    return prevSnake;
                }

                const newSnake = [newHead, ...prevSnake];

                // Eat food
                if (newHead[0] === food[0] && newHead[1] === food[1]) {
                    setScore(s => s + 10);
                    setFood(generateFood());
                } else {
                    newSnake.pop();
                }

                setDirection(dirRef.current);
                return newSnake;
            });
        }, SPEED);

        return () => clearInterval(moveSnake);
    }, [snake, direction, food, gameOver, isPlaying, generateFood]);

    return (
        <div className="flex flex-col items-center justify-center w-full h-full bg-chrome-dark/80 rounded-xl p-4">
            <div className="flex justify-between w-full max-w-[300px] mb-4 text-chrome-neon font-bold text-xl">
                <span>SKOR:</span>
                <span>{score}</span>
            </div>

            <div className="relative bg-chrome-gray/50 border-2 border-chrome-neon/50 rounded-lg overflow-hidden" 
                 style={{ width: 300, height: 300 }}>
                
                {/* Grid */}
                {Array.from({ length: GRID_SIZE * GRID_SIZE }).map((_, i) => (
                    <div key={i} className="absolute border border-white/5" 
                         style={{
                             width: 300/GRID_SIZE, 
                             height: 300/GRID_SIZE,
                             left: (i % GRID_SIZE) * (300/GRID_SIZE),
                             top: Math.floor(i / GRID_SIZE) * (300/GRID_SIZE)
                         }} 
                    />
                ))}

                {/* Food */}
                <div className="absolute bg-pink-500 rounded-sm shadow-[0_0_10px_#ec4899]"
                     style={{
                         width: 300/GRID_SIZE - 2, 
                         height: 300/GRID_SIZE - 2,
                         left: food[0] * (300/GRID_SIZE) + 1,
                         top: food[1] * (300/GRID_SIZE) + 1,
                     }}
                />

                {/* Snake */}
                {snake.map((segment, index) => (
                    <div key={index} 
                         className={`absolute rounded-sm ${index === 0 ? 'bg-chrome-neon z-10 shadow-[0_0_15px_#4a9eff]' : 'bg-chrome-neon/70'}`}
                         style={{
                             width: 300/GRID_SIZE - 2, 
                             height: 300/GRID_SIZE - 2,
                             left: segment[0] * (300/GRID_SIZE) + 1,
                             top: segment[1] * (300/GRID_SIZE) + 1,
                         }}
                    />
                ))}

                {/* Overlays */}
                {!isPlaying && !gameOver && (
                    <div className="absolute inset-0 bg-black/60 flex items-center justify-center z-20">
                        <button onClick={resetGame} className="px-6 py-2 bg-chrome-neon text-chrome-dark font-bold rounded-full hover:bg-white hover:shadow-[0_0_20px_#4a9eff] transition-all">
                            MAIN
                        </button>
                    </div>
                )}

                {gameOver && (
                    <div className="absolute inset-0 bg-red-900/40 backdrop-blur-sm flex flex-col items-center justify-center z-20">
                        <span className="text-red-400 font-bold text-2xl mb-4 drop-shadow-[0_0_10px_red]">PERMAINAN BERAKHIR</span>
                        <button onClick={resetGame} className="px-6 py-2 border-2 border-chrome-neon text-chrome-neon font-bold rounded-full hover:bg-chrome-neon hover:text-chrome-dark transition-all">
                            COBA LAGI
                        </button>
                    </div>
                )}
            </div>

            <div className="mt-4 text-chrome-silver/50 text-xs text-center">
                Gunakan <kbd className="bg-white/10 px-1 rounded">W</kbd><kbd className="bg-white/10 px-1 rounded mx-1">A</kbd><kbd className="bg-white/10 px-1 rounded mx-1">S</kbd><kbd className="bg-white/10 px-1 rounded">D</kbd> atau panah keyboard
            </div>
        </div>
    );
};

export default NeonSnake;
