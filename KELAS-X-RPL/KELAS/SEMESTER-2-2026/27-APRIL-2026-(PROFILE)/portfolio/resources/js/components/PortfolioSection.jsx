import React, { useEffect, useState, useRef } from 'react';
import { portfolioApi } from '../api';
import { motion, AnimatePresence } from 'framer-motion';
import { ExternalLink, Github, FolderGit2, X, Play, Code2, Calendar, Gamepad2 } from 'lucide-react';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

// Import Games
import NeonSnake from './games/NeonSnake';
import MemoryMatch from './games/MemoryMatch';
import SimonSays from './games/SimonSays';

gsap.registerPlugin(ScrollTrigger);

const PortfolioSection = () => {
    const [portfolios, setPortfolios] = useState([]);
    const [loading, setLoading] = useState(true);
    const [selectedProject, setSelectedProject] = useState(null);
    const sectionRef = useRef(null);

    useEffect(() => {
        // Fetch data dari Laravel API
        const fetchPortfolios = async () => {
            try {
                // Hanya ambil yang is_featured = true
                const response = await portfolioApi.getAll({ featured: true });
                setPortfolios(response.data);
                setLoading(false);
            } catch (error) {
                console.error("Error fetching portfolios:", error);
                setLoading(false);
            }
        };

        fetchPortfolios();
    }, []);

    // Helper untuk merender komponen game berdasarkan slug
    const renderGame = (slug) => {
        switch(slug) {
            case 'neon-snake': return <NeonSnake />;
            case 'memory-match': return <MemoryMatch />;
            case 'simon-says': return <SimonSays />;
            default: return (
                <div className="flex items-center justify-center h-full text-chrome-silver">
                    Game tidak tersedia.
                </div>
            );
        }
    };

    if (loading) {
        return (
            <div className="w-full py-24 flex justify-center items-center">
                <div className="w-12 h-12 border-4 border-chrome-neon border-t-transparent rounded-full animate-spin"></div>
            </div>
        );
    }

    return (
        <section ref={sectionRef} className="relative w-full py-24 px-6 md:px-12 lg:px-24 max-w-7xl mx-auto z-10">
            <div className="mb-16">
                <motion.h2 
                    initial={{ opacity: 0, y: 20 }}
                    whileInView={{ opacity: 1, y: 0 }}
                    viewport={{ once: true }}
                    className="text-4xl md:text-5xl font-bold text-white mb-4 flex items-center gap-4"
                >
                    <Gamepad2 className="w-10 h-10 text-chrome-neon" />
                    Proyek Interaktif
                </motion.h2>
                <div className="w-24 h-1 bg-gradient-to-r from-chrome-neon to-transparent rounded-full mb-4"></div>
                <p className="text-chrome-silver/80 max-w-2xl">
                    Koleksi mini game interaktif yang bisa langsung dimainkan. Klik pada kartu atau tombol Play untuk mencoba live demo.
                </p>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {portfolios.map((item, index) => (
                    <motion.div
                        key={item.id}
                        initial={{ opacity: 0, y: 30 }}
                        whileInView={{ opacity: 1, y: 0 }}
                        viewport={{ once: true }}
                        transition={{ delay: index * 0.1 }}
                        onClick={() => setSelectedProject(item)}
                        className="glass-panel chrome-border rounded-2xl overflow-hidden flex flex-col group hover:-translate-y-2 transition-all duration-300 cursor-pointer hover:shadow-[0_0_30px_rgba(74,158,255,0.15)] hover:border-chrome-neon/50"
                    >
                        {/* Thumbnail Game Illustration */}
                        <div className="h-48 bg-gradient-to-br from-chrome-gray to-chrome-dark relative overflow-hidden flex items-center justify-center">
                            <div className="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:20px_20px] [mask-image:radial-gradient(ellipse_50%_50%_at_50%_50%,#000_70%,transparent_100%)]"></div>
                            
                            <Gamepad2 className="w-20 h-20 text-chrome-neon/30 group-hover:scale-110 group-hover:text-chrome-neon/70 transition-all duration-500" />
                            
                            {/* Overlay Play Icon */}
                            <div className="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-[2px]">
                                <div className="bg-chrome-neon text-chrome-dark rounded-full p-4 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                    <Play className="w-8 h-8 ml-1" />
                                </div>
                            </div>
                        </div>

                        <div className="p-6 flex flex-col flex-grow">
                            <h3 className="text-xl font-bold text-white mb-2 group-hover:text-chrome-neon transition-colors">{item.title}</h3>
                            <p className="text-sm text-chrome-silver/80 mb-6 flex-grow line-clamp-2">
                                {item.description}
                            </p>

                            <div className="flex gap-4 pt-4 border-t border-white/5 items-center">
                                <span className="text-chrome-neon flex items-center gap-2 text-sm font-bold ml-auto">
                                    <Play className="w-4 h-4" /> MAIN SEKARANG
                                </span>
                            </div>
                        </div>
                    </motion.div>
                ))}
            </div>

            {/* Modal Popup */}
            <AnimatePresence>
                {selectedProject && (
                    <motion.div
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        exit={{ opacity: 0 }}
                        onClick={() => setSelectedProject(null)}
                        className="fixed inset-0 z-50 flex items-center justify-center p-4 md:p-6 bg-black/80 backdrop-blur-sm"
                    >
                        <motion.div
                            initial={{ scale: 0.95, y: 20 }}
                            animate={{ scale: 1, y: 0 }}
                            exit={{ scale: 0.95, y: 20 }}
                            onClick={(e) => e.stopPropagation()} // Prevent clicking inside modal from closing it
                            className="bg-chrome-dark/95 border border-chrome-neon/30 rounded-2xl w-full max-w-5xl max-h-[90vh] flex flex-col md:flex-row overflow-hidden shadow-[0_0_50px_rgba(74,158,255,0.1)]"
                        >
                            {/* Left Side: Game Area */}
                            <div className="w-full md:w-3/5 bg-black/50 relative flex items-center justify-center min-h-[300px] md:min-h-0 border-b md:border-b-0 md:border-r border-white/5 p-4">
                                {renderGame(selectedProject.slug)}
                            </div>

                            {/* Right Side: Details Area */}
                            <div className="w-full md:w-2/5 p-6 md:p-8 flex flex-col overflow-y-auto">
                                <div className="flex justify-between items-start mb-6">
                                    <h3 className="text-3xl font-bold text-white">{selectedProject.title}</h3>
                                    <button 
                                        onClick={() => setSelectedProject(null)}
                                        className="text-chrome-silver hover:text-white bg-white/5 hover:bg-white/10 rounded-full p-2 transition-colors"
                                    >
                                        <X className="w-5 h-5" />
                                    </button>
                                </div>

                                <div className="space-y-6 flex-grow">
                                    <div>
                                        <h4 className="text-chrome-neon text-sm font-bold uppercase tracking-wider mb-2 flex items-center gap-2">
                                            <Code2 className="w-4 h-4" /> Teknologi
                                        </h4>
                                        <div className="flex flex-wrap gap-2">
                                            {selectedProject.tech_stack?.map((tech, i) => (
                                                <span key={i} className="text-xs font-medium bg-chrome-light px-3 py-1.5 rounded-md text-white border border-white/10">
                                                    {tech}
                                                </span>
                                            ))}
                                        </div>
                                    </div>

                                    <div>
                                        <h4 className="text-chrome-neon text-sm font-bold uppercase tracking-wider mb-2 flex items-center gap-2">
                                            <Calendar className="w-4 h-4" /> Waktu Pengerjaan
                                        </h4>
                                        <p className="text-chrome-silver text-sm">
                                            Diselesaikan pada: <strong className="text-white">{new Date(selectedProject.completed_at).toLocaleDateString('id-ID', { year: 'numeric', month: 'long', day: 'numeric' })}</strong>
                                        </p>
                                    </div>

                                    <div>
                                        <h4 className="text-chrome-neon text-sm font-bold uppercase tracking-wider mb-2">
                                            Deskripsi
                                        </h4>
                                        <p className="text-chrome-silver text-sm leading-relaxed">
                                            {selectedProject.description}
                                        </p>
                                    </div>
                                </div>

                                {/* Footer Links */}
                                {selectedProject.github_url && (
                                    <div className="mt-8 pt-6 border-t border-white/10">
                                        <a href={selectedProject.github_url} target="_blank" rel="noreferrer" 
                                           className="flex items-center justify-center gap-2 w-full py-3 bg-white/5 hover:bg-white/10 border border-white/10 rounded-xl text-white font-medium transition-all hover:border-chrome-neon/50">
                                            <Github className="w-5 h-5" /> Lihat Source Code
                                        </a>
                                    </div>
                                )}
                            </div>
                        </motion.div>
                    </motion.div>
                )}
            </AnimatePresence>
        </section>
    );
};

export default PortfolioSection;
