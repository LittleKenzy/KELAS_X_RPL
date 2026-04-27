import React from 'react';
import { motion } from 'framer-motion';

const traits = [
  { name: 'Analitis', value: 85, color: '#4a9eff' },
  { name: 'Kreatif', value: 90, color: '#9e4aff' },
  { name: 'Perfeksionis', value: 95, color: '#ff4a9e' },
  { name: 'Adaptif', value: 80, color: '#4aff9e' },
];

const Personality = () => {
  return (
    <section className="py-24 relative">
      <div className="container mx-auto px-6">
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          
          <div>
            <h2 className="text-sm uppercase tracking-[0.3em] text-chrome-neon mb-4 font-semibold">Pola Pikir</h2>
            <h3 className="text-4xl md:text-5xl font-bold text-white mb-8">Sifat & Nilai.</h3>
            <p className="text-chrome-silver/70 text-lg font-light leading-relaxed mb-8">
              Pendekatan saya terhadap pekerjaan dan kehidupan didorong oleh keseimbangan antara logika yang ketat dan kreativitas tanpa batas. Saya percaya bahwa inovasi sejati terjadi ketika disiplin bertemu imajinasi.
            </p>
            
            <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
              <div className="glass-panel p-6 rounded-xl border border-white/5">
                <h4 className="text-white font-bold mb-2">Fokus</h4>
                <p className="text-chrome-silver/60 text-sm">Pekerjaan mendalam di atas multitasking.</p>
              </div>
              <div className="glass-panel p-6 rounded-xl border border-white/5">
                <h4 className="text-white font-bold mb-2">Rasa Ingin Tahu</h4>
                <p className="text-chrome-silver/60 text-sm">Selalu mempertanyakan 'bagaimana' dan 'mengapa'.</p>
              </div>
            </div>
          </div>

          <div className="relative">
            <div className="grid grid-cols-2 gap-8">
              {traits.map((trait, index) => (
                <div key={index} className="flex flex-col items-center">
                  <div className="relative w-32 h-32 flex items-center justify-center mb-4">
                    <svg className="absolute inset-0 w-full h-full -rotate-90">
                      <circle 
                        cx="64" cy="64" r="60" 
                        fill="none" 
                        stroke="rgba(255,255,255,0.05)" 
                        strokeWidth="4" 
                      />
                      <motion.circle 
                        cx="64" cy="64" r="60" 
                        fill="none" 
                        stroke={trait.color} 
                        strokeWidth="4"
                        strokeLinecap="round"
                        initial={{ strokeDasharray: "0 400" }}
                        whileInView={{ strokeDasharray: `${(trait.value / 100) * 377} 400` }}
                        viewport={{ once: true }}
                        transition={{ duration: 1.5, delay: index * 0.2, ease: "easeOut" }}
                      />
                    </svg>
                    <div className="absolute inset-0 flex flex-col items-center justify-center">
                      <span className="text-2xl font-bold text-white">{trait.value}%</span>
                    </div>
                  </div>
                  <h4 className="text-chrome-silver font-medium tracking-wide">{trait.name}</h4>
                </div>
              ))}
            </div>
          </div>

        </div>
      </div>
    </section>
  );
};

export default Personality;
