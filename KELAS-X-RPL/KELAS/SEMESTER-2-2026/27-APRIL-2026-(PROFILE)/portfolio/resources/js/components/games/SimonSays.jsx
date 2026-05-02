import React, { useState, useEffect, useRef } from 'react';

const COLORS = [
    { id: 0, color: 'bg-red-500', shadow: 'shadow-[0_0_30px_#ef4444]' },
    { id: 1, color: 'bg-blue-500', shadow: 'shadow-[0_0_30px_#3b82f6]' },
    { id: 2, color: 'bg-green-500', shadow: 'shadow-[0_0_30px_#22c55e]' },
    { id: 3, color: 'bg-yellow-400', shadow: 'shadow-[0_0_30px_#facc15]' }
];

const SimonSays = () => {
    const [sequence, setSequence] = useState([]);
    const [playingSequence, setPlayingSequence] = useState(false);
    const [playerIndex, setPlayerIndex] = useState(0);
    const [activeColor, setActiveColor] = useState(null);
    const [gameOver, setGameOver] = useState(false);
    const [gameStarted, setGameStarted] = useState(false);
    const [score, setScore] = useState(0);

    const playSound = (id) => {
        // Optional: Add simple web audio API beeps here if desired
    };

    const lightUp = (id, duration = 400) => {
        setActiveColor(id);
        playSound(id);
        setTimeout(() => {
            setActiveColor(null);
        }, duration);
    };

    const nextRound = () => {
        setPlayerIndex(0);
        const nextColor = Math.floor(Math.random() * 4);
        const newSequence = [...sequence, nextColor];
        setSequence(newSequence);
        playSequence(newSequence);
    };

    const playSequence = (seq) => {
        setPlayingSequence(true);
        let i = 0;
        const interval = setInterval(() => {
            lightUp(seq[i]);
            i++;
            if (i >= seq.length) {
                clearInterval(interval);
                setTimeout(() => setPlayingSequence(false), 500);
            }
        }, 800);
    };

    const handleColorClick = (id) => {
        if (playingSequence || !gameStarted || gameOver) return;

        lightUp(id, 200);

        if (id === sequence[playerIndex]) {
            if (playerIndex === sequence.length - 1) {
                setScore(score + 1);
                setTimeout(nextRound, 1000);
            } else {
                setPlayerIndex(playerIndex + 1);
            }
        } else {
            setGameOver(true);
            setGameStarted(false);
        }
    };

    const startGame = () => {
        setSequence([]);
        setScore(0);
        setGameOver(false);
        setGameStarted(true);
        // Delay before first round
        setTimeout(() => {
            const firstColor = Math.floor(Math.random() * 4);
            setSequence([firstColor]);
            playSequence([firstColor]);
        }, 500);
    };

    return (
        <div className="flex flex-col items-center justify-center w-full h-full p-4">
            <div className="mb-8 text-center">
                <h3 className="text-2xl font-bold text-white tracking-widest mb-2">IKUTI WARNA</h3>
                <p className="text-chrome-neon font-medium text-lg">LEVEL {score}</p>
            </div>

            <div className="relative">
                {/* 4 Colored Buttons */}
                <div className="grid grid-cols-2 gap-4 w-64 h-64 rounded-full overflow-hidden p-2 bg-chrome-gray/50 border-4 border-chrome-light shadow-xl">
                    {COLORS.map((c) => (
                        <button
                            key={c.id}
                            onClick={() => handleColorClick(c.id)}
                            disabled={playingSequence || !gameStarted}
                            className={`w-full h-full rounded-2xl transition-all duration-150 
                                ${c.color} 
                                ${activeColor === c.id ? `brightness-150 ${c.shadow} scale-95` : 'opacity-60 hover:opacity-80'}
                                ${(playingSequence || !gameStarted) ? 'cursor-default' : 'cursor-pointer active:scale-95'}
                            `}
                        />
                    ))}
                    
                    {/* Center Core */}
                    <div className="absolute inset-0 m-auto w-24 h-24 bg-chrome-dark rounded-full flex items-center justify-center border-4 border-chrome-light shadow-inner z-10">
                        {!gameStarted && (
                            <button 
                                onClick={startGame}
                                className="text-chrome-neon font-bold hover:scale-110 transition-transform"
                            >
                                {gameOver ? 'ULANG' : 'MULAI'}
                            </button>
                        )}
                        {gameStarted && playingSequence && (
                            <span className="text-chrome-silver/50 text-xs animate-pulse">PERHATIKAN</span>
                        )}
                        {gameStarted && !playingSequence && (
                            <span className="text-green-400 text-xs">GILIRANMU</span>
                        )}
                    </div>
                </div>
            </div>

            {gameOver && (
                <div className="mt-8 text-red-400 font-bold animate-bounce">
                    URUTAN SALAH!
                </div>
            )}
        </div>
    );
};

export default SimonSays;
