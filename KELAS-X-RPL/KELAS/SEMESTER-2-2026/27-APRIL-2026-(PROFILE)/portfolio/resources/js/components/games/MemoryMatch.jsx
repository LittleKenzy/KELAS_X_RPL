import React, { useState, useEffect } from 'react';
import { motion } from 'framer-motion';

const EMOJIS = ['🚀', '💻', '🎮', '👾', '🔥', '⚡', '🤖', '🎧'];

const MemoryMatch = () => {
    const [cards, setCards] = useState([]);
    const [flipped, setFlipped] = useState([]);
    const [solved, setSolved] = useState([]);
    const [disabled, setDisabled] = useState(false);
    const [moves, setMoves] = useState(0);

    const initializeGame = () => {
        const shuffled = [...EMOJIS, ...EMOJIS]
            .sort(() => Math.random() - 0.5)
            .map((id, index) => ({ id: index, content: id }));
        setCards(shuffled);
        setFlipped([]);
        setSolved([]);
        setMoves(0);
        setDisabled(false);
    };

    useEffect(() => {
        initializeGame();
    }, []);

    const handleCardClick = (index) => {
        if (disabled || flipped.includes(index) || solved.includes(index)) return;

        const newFlipped = [...flipped, index];
        setFlipped(newFlipped);

        if (newFlipped.length === 2) {
            setDisabled(true);
            setMoves(m => m + 1);
            
            const [first, second] = newFlipped;
            if (cards[first].content === cards[second].content) {
                setSolved([...solved, first, second]);
                setFlipped([]);
                setDisabled(false);
            } else {
                setTimeout(() => {
                    setFlipped([]);
                    setDisabled(false);
                }, 1000);
            }
        }
    };

    return (
        <div className="flex flex-col items-center justify-center w-full h-full p-4">
            <div className="flex justify-between w-full max-w-[320px] mb-6 text-chrome-silver font-medium">
                <span>Langkah: <span className="text-chrome-neon font-bold">{moves}</span></span>
                {solved.length === cards.length && (
                    <span className="text-green-400 font-bold animate-pulse">KAMU MENANG! 🎉</span>
                )}
            </div>

            <div className="grid grid-cols-4 gap-3 w-full max-w-[320px] perspective-1000">
                {cards.map((card, index) => {
                    const isFlipped = flipped.includes(index) || solved.includes(index);
                    return (
                        <div 
                            key={card.id} 
                            className="relative w-full aspect-square cursor-pointer"
                            onClick={() => handleCardClick(index)}
                        >
                            <motion.div
                                className="w-full h-full absolute inset-0 preserve-3d"
                                initial={false}
                                animate={{ rotateY: isFlipped ? 180 : 0 }}
                                transition={{ duration: 0.4, type: "spring", stiffness: 260, damping: 20 }}
                                style={{ transformStyle: 'preserve-3d' }}
                            >
                                {/* Back of card (Hidden content) */}
                                <div className="absolute inset-0 bg-chrome-light/80 border border-white/10 rounded-xl flex items-center justify-center text-3xl backface-hidden shadow-lg hover:bg-chrome-light transition-colors"
                                     style={{ backfaceVisibility: 'hidden' }}>
                                    <span className="opacity-20">?</span>
                                </div>
                                
                                {/* Front of card (Revealed emoji) */}
                                <div className="absolute inset-0 bg-gradient-to-br from-chrome-gray to-chrome-light border border-chrome-neon/30 rounded-xl flex items-center justify-center text-3xl backface-hidden shadow-[0_0_15px_rgba(74,158,255,0.2)]"
                                     style={{ backfaceVisibility: 'hidden', transform: 'rotateY(180deg)' }}>
                                    {card.content}
                                </div>
                            </motion.div>
                        </div>
                    );
                })}
            </div>

            <button 
                onClick={initializeGame}
                className="mt-8 px-6 py-2 rounded-full border border-chrome-silver/20 hover:border-chrome-neon hover:text-chrome-neon transition-colors text-sm font-medium"
            >
                ULANG PERMAINAN
            </button>
        </div>
    );
};

export default MemoryMatch;
