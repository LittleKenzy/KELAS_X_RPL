import React, { useEffect, useRef } from 'react';
import { motion } from 'framer-motion';
import { ArrowDown } from 'lucide-react';
import gsap from 'gsap';

const Hero = () => {
  const containerRef = useRef(null);
  
  useEffect(() => {
    const ctx = gsap.context(() => {
      gsap.to('.hero-bg-parallax', {
        yPercent: 30,
        ease: 'none',
        scrollTrigger: {
          trigger: containerRef.current,
          start: 'top top',
          end: 'bottom top',
          scrub: true
        }
      });
    }, containerRef);
    return () => ctx.revert();
  }, []);

  return (
    <section ref={containerRef} className="relative min-h-screen flex items-center justify-center overflow-hidden pt-20 pb-20">
      {/* Background Grid Pattern */}
      <div className="absolute inset-0 z-0 hero-bg-parallax opacity-20" 
           style={{ backgroundImage: 'radial-gradient(circle at 2px 2px, rgba(255,255,255,0.15) 1px, transparent 0)', backgroundSize: '40px 40px' }} />
      
      <div className="container mx-auto px-6 relative z-10">
        <div className="max-w-5xl mx-auto flex flex-col items-center text-center">
          
          <motion.div
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1] }}
            className="inline-block mb-6 px-4 py-1.5 rounded-full border border-chrome-light glass-panel text-xs uppercase tracking-[0.2em] font-medium text-chrome-silver"
          >
            <span className="w-2 h-2 rounded-full bg-chrome-neon inline-block mr-2 animate-pulse shadow-[0_0_8px_rgba(74,158,255,0.8)]"></span>
            Protokol Identitas Digital Diaktifkan
          </motion.div>

          <motion.h1 
            initial={{ opacity: 0, y: 40 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 1, delay: 0.2, ease: [0.16, 1, 0.3, 1] }}
            className="text-6xl md:text-8xl font-bold tracking-tight mb-8 text-white"
          >
            Halo, Saya
            <span className="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-chrome-silver via-white to-chrome-gray drop-shadow-lg">
              Bilal Alaudin.
            </span>
          </motion.h1>

          <motion.p 
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 1, delay: 0.5 }}
            className="text-lg md:text-xl text-chrome-silver/70 max-w-2xl mb-12 font-light leading-relaxed"
          >
            Siswa Kelas 10 RPL (Absen 6) dari SMKN 2 Buduran. Saya seorang pengembang frontend premium & insinyur kreatif yang memadukan kode dengan animasi visual untuk membangun dunia web yang imersif.
          </motion.p>

          <motion.div 
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 0.7 }}
            className="flex flex-col sm:flex-row gap-6 items-center"
          >
            <button className="interactive group relative px-8 py-4 bg-white text-black font-semibold rounded-full overflow-hidden transition-all hover:scale-105 active:scale-95">
              <span className="relative z-10 flex items-center gap-2">
                Jelajahi Dunia Saya
              </span>
              <div className="absolute inset-0 h-full w-0 bg-chrome-neon transition-all duration-300 ease-out group-hover:w-full z-0"></div>
              <span className="absolute inset-0 h-full w-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center z-10 text-white gap-2 font-semibold">
                Jelajahi Dunia Saya
              </span>
            </button>
            
            <a href="#who-am-i" className="interactive text-sm uppercase tracking-widest text-chrome-silver hover:text-white transition-colors flex items-center gap-2">
              Temukan <ArrowDown className="w-4 h-4" />
            </a>
          </motion.div>

        </div>
      </div>

      {/* Scroll indicator */}
      <motion.div 
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        transition={{ delay: 1.2, duration: 1 }}
        className="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2"
      >
        <div className="w-[1px] h-16 bg-gradient-to-b from-transparent via-chrome-silver/50 to-transparent relative overflow-hidden">
          <motion.div 
            className="absolute top-0 w-full h-1/2 bg-white"
            animate={{ y: ['-100%', '200%'] }}
            transition={{ repeat: Infinity, duration: 1.5, ease: 'linear' }}
          />
        </div>
      </motion.div>
    </section>
  );
};

export default Hero;
