import React from 'react';
import { motion } from 'framer-motion';

const LifeMotto = () => {
  return (
    <section className="py-32 relative overflow-hidden flex items-center justify-center min-h-[60vh] bg-gradient-to-b from-chrome-dark to-black">
      <div className="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(74,158,255,0.05)_0%,transparent_70%)]"></div>
      
      <div className="container mx-auto px-6 relative z-10 text-center">
        <motion.div
          initial={{ opacity: 0, scale: 0.9 }}
          whileInView={{ opacity: 1, scale: 1 }}
          viewport={{ once: true, margin: "-100px" }}
          transition={{ duration: 1, ease: [0.16, 1, 0.3, 1] }}
          className="max-w-4xl mx-auto"
        >
          <div className="text-chrome-neon/50 mb-8">
            <svg className="w-12 h-12 mx-auto" fill="currentColor" viewBox="0 0 24 24">
              <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
            </svg>
          </div>
          
          <h3 className="text-3xl md:text-5xl lg:text-6xl font-bold text-white mb-8 leading-tight">
            "Desain bukan hanya tentang tampilan atau rasa. <span className="text-transparent bg-clip-text bg-gradient-to-r from-chrome-neon to-chrome-silver">Desain adalah bagaimana ia bekerja.</span>"
          </h3>
          
          <div className="w-24 h-[1px] bg-gradient-to-r from-transparent via-chrome-neon/50 to-transparent mx-auto mb-8"></div>
          
          <p className="text-chrome-silver/60 uppercase tracking-[0.3em] text-sm">
            Sebuah Filosofi
          </p>
        </motion.div>
      </div>
    </section>
  );
};

export default LifeMotto;
