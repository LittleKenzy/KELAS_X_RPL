import React, { useEffect, useState } from 'react';
import { blogApi } from '../api';
import { motion, AnimatePresence } from 'framer-motion';
import { BookOpen, Clock, CalendarDays, ArrowRight, X } from 'lucide-react';

const BlogSection = () => {
    const [blogs, setBlogs] = useState([]);
    const [loading, setLoading] = useState(true);
    const [selectedBlog, setSelectedBlog] = useState(null);

    useEffect(() => {
        // Fetch data dari Laravel API
        const fetchBlogs = async () => {
            try {
                const response = await blogApi.getAll({ per_page: 3 }); // Ambil 3 terbaru
                setBlogs(response.data);
                setLoading(false);
            } catch (error) {
                console.error("Error fetching blogs:", error);
                setLoading(false);
            }
        };

        fetchBlogs();
    }, []);

    if (loading) return null; // Simple loading state for blog

    const formatDate = (dateString) => {
        if (!dateString) return '';
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(dateString).toLocaleDateString('id-ID', options);
    };

    const formatBody = (text) => {
        if (!text) return '';
        
        // 1. Format Code Blocks (```language ... ```)
        let formatted = text.replace(/```([\w-]*)\n([\s\S]*?)```/g, (match, lang, code) => {
            return `<pre class="bg-[#0d1117] text-[#c9d1d9] p-5 rounded-xl border border-white/10 overflow-x-auto font-mono text-sm sm:text-base shadow-inner my-6 relative group">
                <span class="absolute top-2 right-4 text-[10px] text-chrome-silver/40 group-hover:text-chrome-neon/60 transition-colors uppercase tracking-wider">${lang || 'CODE'}</span>
                <code>${code.replace(/</g, '&lt;').replace(/>/g, '&gt;')}</code>
            </pre>`;
        });

        // 2. Format Inline Code (`code`)
        formatted = formatted.replace(/`([^`]+)`/g, '<code class="bg-[#161b22] text-chrome-neon px-1.5 py-0.5 rounded-md font-mono text-[0.9em] border border-white/5">$1</code>');

        // 3. Konversi newline menjadi <br/> tetapi abaikan yang ada di dalam tag <pre>
        const parts = formatted.split(/(<pre[\s\S]*?<\/pre>)/g);
        for (let i = 0; i < parts.length; i++) {
            if (!parts[i].startsWith('<pre')) {
                parts[i] = parts[i].replace(/\n/g, '<br/>');
            }
        }
        return parts.join('');
    };

    return (
        <section className="relative w-full py-24 px-6 md:px-12 lg:px-24 max-w-7xl mx-auto z-10">
            <div className="mb-16 flex justify-between items-end">
                <div>
                    <motion.h2 
                        initial={{ opacity: 0, y: 20 }}
                        whileInView={{ opacity: 1, y: 0 }}
                        viewport={{ once: true }}
                        className="text-4xl md:text-5xl font-bold text-white mb-4 flex items-center gap-4"
                    >
                        <BookOpen className="w-10 h-10 text-chrome-neon" />
                        Tulisan Terbaru
                    </motion.h2>
                    <div className="w-24 h-1 bg-gradient-to-r from-chrome-neon to-transparent rounded-full"></div>
                </div>
                <button className="hidden md:flex items-center gap-2 text-chrome-silver hover:text-chrome-neon transition-colors">
                    Lihat Semua <ArrowRight className="w-4 h-4" />
                </button>
            </div>

            <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {blogs.map((blog, index) => (
                    <motion.article
                        key={blog.id}
                        initial={{ opacity: 0, x: -20 }}
                        whileInView={{ opacity: 1, x: 0 }}
                        viewport={{ once: true }}
                        transition={{ delay: index * 0.15 }}
                        onClick={() => setSelectedBlog(blog)}
                        className="glass-panel rounded-2xl p-6 group hover:bg-white/[0.03] transition-colors border border-white/5 hover:border-chrome-neon/30 flex flex-col cursor-pointer hover:shadow-[0_0_30px_rgba(74,158,255,0.05)]"
                    >
                        <div className="flex items-center gap-4 text-xs text-chrome-silver/60 mb-4">
                            <span className="flex items-center gap-1.5 bg-black/30 px-2 py-1 rounded">
                                <CalendarDays className="w-3 h-3" />
                                {formatDate(blog.published_at)}
                            </span>
                            <span className="flex items-center gap-1.5">
                                <Clock className="w-3 h-3" />
                                {blog.read_time} mnt baca
                            </span>
                        </div>

                        <h3 className="text-xl font-bold text-white mb-3 group-hover:text-chrome-neon transition-colors leading-tight">
                            {blog.title}
                        </h3>
                        
                        <p className="text-sm text-chrome-silver/70 mb-6 flex-grow line-clamp-3">
                            {blog.excerpt}
                        </p>

                        <div className="flex items-center justify-between pt-4 border-t border-white/5 mt-auto">
                            <div className="flex gap-2">
                                {blog.tags?.slice(0, 2).map((tag, i) => (
                                    <span key={i} className="text-[10px] uppercase tracking-wider bg-white/5 text-chrome-silver px-2 py-1 rounded">
                                        #{tag}
                                    </span>
                                ))}
                            </div>
                            <button className="text-chrome-neon w-8 h-8 rounded-full flex items-center justify-center bg-chrome-neon/10 group-hover:bg-chrome-neon group-hover:text-chrome-dark transition-all">
                                <ArrowRight className="w-4 h-4" />
                            </button>
                        </div>
                    </motion.article>
                ))}
            </div>

            {/* Modal Popup Blog Detail */}
            <AnimatePresence>
                {selectedBlog && (
                    <motion.div
                        initial={{ opacity: 0 }}
                        animate={{ opacity: 1 }}
                        exit={{ opacity: 0 }}
                        onClick={() => setSelectedBlog(null)}
                        className="fixed inset-0 z-50 flex items-center justify-center p-4 md:p-6 bg-black/80 backdrop-blur-sm"
                    >
                        <motion.div
                            initial={{ scale: 0.95, y: 20 }}
                            animate={{ scale: 1, y: 0 }}
                            exit={{ scale: 0.95, y: 20 }}
                            onClick={(e) => e.stopPropagation()} // Hindari klik di dalam modal menutup popup
                            className="bg-chrome-dark/95 border border-chrome-neon/30 rounded-2xl w-full max-w-4xl max-h-[90vh] flex flex-col shadow-[0_0_50px_rgba(74,158,255,0.1)] overflow-hidden"
                        >
                            {/* Modal Header */}
                            <div className="p-6 border-b border-white/10 flex justify-between items-start bg-gradient-to-b from-chrome-gray/50 to-transparent">
                                <div>
                                    <div className="flex items-center gap-4 text-xs text-chrome-silver/80 mb-4">
                                        <span className="flex items-center gap-1.5 bg-black/50 px-3 py-1.5 rounded-md border border-white/5">
                                            <CalendarDays className="w-4 h-4 text-chrome-neon" />
                                            {formatDate(selectedBlog.published_at)}
                                        </span>
                                        <span className="flex items-center gap-1.5 bg-black/50 px-3 py-1.5 rounded-md border border-white/5">
                                            <Clock className="w-4 h-4 text-chrome-neon" />
                                            {selectedBlog.read_time} menit membaca
                                        </span>
                                    </div>
                                    <h3 className="text-3xl md:text-4xl font-bold text-white leading-tight">
                                        {selectedBlog.title}
                                    </h3>
                                </div>
                                <button 
                                    onClick={() => setSelectedBlog(null)}
                                    className="text-chrome-silver hover:text-white bg-white/5 hover:bg-white/10 rounded-full p-2 transition-colors shrink-0 ml-4"
                                >
                                    <X className="w-6 h-6" />
                                </button>
                            </div>

                            {/* Modal Body */}
                            <div className="p-6 md:p-8 overflow-y-auto">
                                <div className="prose prose-invert prose-chrome max-w-none text-chrome-silver/90 leading-relaxed text-base md:text-lg">
                                    <div dangerouslySetInnerHTML={{ __html: formatBody(selectedBlog.body) }} />
                                </div>

                                {/* Tags & Footer */}
                                <div className="mt-12 pt-6 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-4">
                                    <div className="flex flex-wrap gap-2">
                                        {selectedBlog.tags?.map((tag, i) => (
                                            <span key={i} className="text-xs uppercase tracking-widest bg-chrome-neon/10 text-chrome-neon px-3 py-1.5 rounded-full border border-chrome-neon/20">
                                                #{tag}
                                            </span>
                                        ))}
                                    </div>
                                    <button 
                                        onClick={() => setSelectedBlog(null)}
                                        className="text-chrome-silver hover:text-white transition-colors text-sm font-medium border border-white/10 px-6 py-2 rounded-full hover:bg-white/5"
                                    >
                                        Tutup Artikel
                                    </button>
                                </div>
                            </div>
                        </motion.div>
                    </motion.div>
                )}
            </AnimatePresence>
        </section>
    );
};

export default BlogSection;
