import React from 'react';
import { motion } from 'framer-motion';
import { Github, Mail, ArrowUpRight } from 'lucide-react';

const Footer = () => {
  const scrollToTop = () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  };

  return (
    <footer className="relative pt-32 pb-12 overflow-hidden bg-black">
      <div className="absolute bottom-0 left-1/2 -translate-x-1/2 w-[80%] h-[200px] bg-chrome-neon/10 blur-[100px] pointer-events-none"></div>

      <div className="container mx-auto px-6 relative z-10">
        <div className="grid grid-cols-1 md:grid-cols-2 gap-16 mb-24">
          
          <div className="max-w-md">
            <h2 className="text-4xl font-bold text-white mb-6">Mari bangun sesuatu yang luar biasa.</h2>
            <p className="text-chrome-silver/60 mb-8">
              Terbuka untuk kolaborasi, proyek menarik, dan obrolan santai. Hubungi saya jika Anda ingin menciptakan pengalaman digital yang berkesan.
            </p>
            <a href="mailto:hello@example.com" className="interactive inline-flex items-center gap-2 px-6 py-3 rounded-full border border-chrome-light hover:border-chrome-neon hover:bg-chrome-neon/10 transition-colors text-white group">
              <Mail className="w-4 h-4" />
              <span>Mulai Kontak</span>
              <ArrowUpRight className="w-4 h-4 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" />
            </a>
          </div>

          <div className="flex flex-col md:items-end justify-between">
            <div className="flex gap-4 mb-8 md:mb-0">
              <a href="https://github.com/LittleKenzy" target="_blank" rel="noopener noreferrer" className="interactive w-12 h-12 rounded-full border border-white/10 flex items-center justify-center text-chrome-silver hover:text-white hover:border-chrome-neon hover:bg-chrome-neon/10 transition-all duration-300">
                <Github className="w-5 h-5" />
              </a>
            </div>

            <button onClick={scrollToTop} className="interactive group flex items-center gap-2 text-chrome-silver/60 hover:text-white transition-colors text-sm uppercase tracking-widest">
              Kembali ke atas 
              <div className="w-8 h-8 rounded-full border border-white/10 flex items-center justify-center group-hover:border-chrome-neon transition-colors">
                <ArrowUpRight className="w-4 h-4 -rotate-45" />
              </div>
            </button>
          </div>

        </div>

        <div className="flex flex-col md:flex-row items-center justify-between pt-8 border-t border-white/5 text-chrome-silver/40 text-sm">
          <p>© {new Date().getFullYear()} Bilal Alaudin. Hak Cipta Dilindungi.</p>
          <div className="flex items-center gap-2 mt-4 md:mt-0">
            <span>Beroperasi dari kehampaan</span>
            <span className="w-1.5 h-1.5 rounded-full bg-chrome-neon animate-pulse"></span>
          </div>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
