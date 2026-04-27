import React, { useRef } from 'react';
import { motion, useScroll, useTransform } from 'framer-motion';

const WhoAmI = () => {
  const sectionRef = useRef(null);
  const { scrollYProgress } = useScroll({
    target: sectionRef,
    offset: ["start end", "end start"]
  });

  const y = useTransform(scrollYProgress, [0, 1], [100, -100]);
  const opacity = useTransform(scrollYProgress, [0, 0.3, 0.6, 1], [0, 1, 1, 0]);

  return (
    <section id="who-am-i" ref={sectionRef} className="py-32 relative overflow-hidden">
      <div className="container mx-auto px-6 relative z-10">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          
          <motion.div 
            style={{ y, opacity }}
            className="flex flex-col gap-8"
          >
            <div>
              <h2 className="text-sm uppercase tracking-[0.3em] text-chrome-neon mb-4 font-semibold">Identitas</h2>
              <h3 className="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                Merancang<br />
                <span className="text-transparent bg-clip-text bg-gradient-to-r from-white/80 to-white/20">
                  Ruang Digital.
                </span>
              </h3>
            </div>
            
            <div className="space-y-6 text-chrome-silver/80 text-lg font-light leading-relaxed">
              <p>
                Saya tidak sekadar menulis kode; saya membangun pengalaman. Berawal dari ketertarikan pada media interaktif, perjalanan saya berkembang menjadi obsesi terhadap piksel yang sempurna dan performa yang mulus.
              </p>
              <p>
                Filosofi saya sederhana: estetika tanpa fungsi hanyalah seni, namun fungsi tanpa estetika adalah peluang yang terlewatkan. Saya hadir di persimpangan antara rekayasa logis dan desain visual yang kreatif.
              </p>
              <p>
                Sebagai siswa SMKN 2 Buduran jurusan Rekayasa Perangkat Lunak, saya terus belajar dan bereksperimen. Saat Anda berinteraksi dengan karya saya, Anda tidak hanya mengklik tombol—Anda merasakan pergerakan yang dirancang secara detail.
              </p>
            </div>
          </motion.div>

          <motion.div 
            initial={{ opacity: 0, x: 50 }}
            whileInView={{ opacity: 1, x: 0 }}
            viewport={{ once: true, margin: "-100px" }}
            transition={{ duration: 0.8 }}
            className="relative h-[600px] w-full rounded-2xl overflow-hidden chrome-border"
          >
            <div className="absolute inset-0 bg-gradient-to-tr from-chrome-gray to-chrome-dark z-0"></div>
            
            <div className="absolute inset-0 z-10 flex items-center justify-center p-12">
              <div className="relative w-full h-full glass-panel rounded-xl overflow-hidden flex items-center justify-center border border-white/5 shadow-2xl">
                <div className="absolute inset-0 bg-[radial-gradient(circle_at_50%_50%,rgba(74,158,255,0.1),transparent_50%)]"></div>
                
                <motion.div 
                  animate={{ rotate: 360 }}
                  transition={{ duration: 20, repeat: Infinity, ease: "linear" }}
                  className="w-64 h-64 border-[1px] border-chrome-silver/20 rounded-full flex items-center justify-center"
                >
                  <motion.div 
                    animate={{ rotate: -720 }}
                    transition={{ duration: 30, repeat: Infinity, ease: "linear" }}
                    className="w-48 h-48 border-[1px] border-chrome-neon/30 rounded-full"
                  />
                </motion.div>
                
                <div className="absolute z-20 text-center">
                  <span className="block text-4xl font-bold text-white mb-2 tracking-widest">KODER</span>
                  <span className="block text-sm uppercase tracking-[0.5em] text-chrome-silver/50">Desainer</span>
                </div>
              </div>
            </div>
          </motion.div>
          
        </div>
      </div>
    </section>
  );
};

export default WhoAmI;
