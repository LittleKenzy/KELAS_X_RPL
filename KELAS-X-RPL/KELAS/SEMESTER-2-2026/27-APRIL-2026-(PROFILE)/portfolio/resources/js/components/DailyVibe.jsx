import React from 'react';
import { motion } from 'framer-motion';

const DailyVibe = () => {
  return (
    <section className="py-32 relative overflow-hidden bg-gradient-to-b from-chrome-dark via-[#050505] to-chrome-dark">
      <div className="absolute inset-0 z-0">
        <motion.div 
          animate={{ 
            backgroundPosition: ['0% 0%', '100% 100%'],
            opacity: [0.3, 0.5, 0.3]
          }}
          transition={{ duration: 20, repeat: Infinity, ease: 'linear' }}
          className="w-full h-full"
          style={{
            backgroundImage: 'radial-gradient(circle at 50% 50%, rgba(74, 158, 255, 0.05) 0%, transparent 50%)',
            backgroundSize: '150% 150%'
          }}
        />
      </div>

      <div className="container mx-auto px-6 relative z-10">
        <div className="text-center max-w-3xl mx-auto mb-20">
          <h2 className="text-sm uppercase tracking-[0.3em] text-chrome-neon mb-4 font-semibold">Atmosfer</h2>
          <h3 className="text-4xl md:text-5xl font-bold text-white mb-6">Dunia Digital Saya.</h3>
          <p className="text-chrome-silver/60 text-lg">
            Sekilas pandang ke lingkungan tempat ide menjadi kenyataan. Estetika ruang kerja saya mencerminkan kejernihan kode saya.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-12 gap-6 h-[800px] md:h-[600px]">
          <motion.div 
            initial={{ opacity: 0, y: 50 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="md:col-span-8 rounded-2xl glass-panel chrome-border relative overflow-hidden group"
          >
            <div className="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent z-10"></div>
            <div className="w-full h-full bg-[#111] flex items-center justify-center text-chrome-silver/20 group-hover:scale-105 transition-transform duration-700">
               <div className="relative w-full h-full flex flex-col items-center justify-center p-12">
                  <div className="w-[80%] h-[50%] border border-white/10 rounded-lg shadow-[0_0_50px_rgba(74,158,255,0.05)] relative overflow-hidden bg-black/50">
                    <div className="absolute top-0 w-full h-6 border-b border-white/10 flex items-center px-4 gap-2">
                      <div className="w-2 h-2 rounded-full bg-red-500/50"></div>
                      <div className="w-2 h-2 rounded-full bg-yellow-500/50"></div>
                      <div className="w-2 h-2 rounded-full bg-green-500/50"></div>
                    </div>
                    <div className="p-8 pt-12 space-y-4 font-mono text-xs text-chrome-neon/50">
                      <motion.div initial={{ width: 0 }} whileInView={{ width: '40%' }} className="h-2 bg-chrome-neon/20 rounded"></motion.div>
                      <motion.div initial={{ width: 0 }} whileInView={{ width: '70%' }} transition={{ delay: 0.2 }} className="h-2 bg-chrome-neon/10 rounded"></motion.div>
                      <motion.div initial={{ width: 0 }} whileInView={{ width: '50%' }} transition={{ delay: 0.4 }} className="h-2 bg-chrome-neon/20 rounded"></motion.div>
                    </div>
                  </div>
               </div>
            </div>
            <div className="absolute bottom-8 left-8 z-20">
              <h4 className="text-2xl font-bold text-white mb-2">Laboratorium</h4>
              <p className="text-chrome-silver/60">Sesi coding tengah malam. Musik lofi. Ketikan keyboard mekanik.</p>
            </div>
          </motion.div>

          <div className="md:col-span-4 flex flex-col gap-6">
            <motion.div 
              initial={{ opacity: 0, x: 50 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              transition={{ delay: 0.2 }}
              className="flex-1 rounded-2xl glass-panel chrome-border p-8 flex flex-col justify-center"
            >
              <h5 className="text-chrome-neon text-sm tracking-widest uppercase mb-2">Waktu Utama</h5>
              <div className="text-4xl font-light text-white mb-2">23:00</div>
              <p className="text-chrome-silver/50 text-sm">Ketika dunia tertidur, pikiran terbangun.</p>
            </motion.div>

            <motion.div 
              initial={{ opacity: 0, x: 50 }}
              whileInView={{ opacity: 1, x: 0 }}
              viewport={{ once: true }}
              transition={{ delay: 0.4 }}
              className="flex-1 rounded-2xl glass-panel chrome-border p-8 flex flex-col justify-center"
            >
              <h5 className="text-chrome-neon text-sm tracking-widest uppercase mb-4">Status Saat Ini</h5>
              <div className="flex items-center gap-3">
                <div className="relative flex h-3 w-3">
                  <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                  <span className="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </div>
                <span className="text-white font-medium">Membangun masa depan</span>
              </div>
            </motion.div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default DailyVibe;
