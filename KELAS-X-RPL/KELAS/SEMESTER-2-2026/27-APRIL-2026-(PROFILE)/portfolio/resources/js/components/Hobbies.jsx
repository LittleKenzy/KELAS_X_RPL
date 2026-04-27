import React, { useRef } from 'react';
import { motion, useScroll, useTransform } from 'framer-motion';
import { Gamepad2, MonitorPlay, Film, Music, Dumbbell, MoonStar, Map } from 'lucide-react';

const hobbies = [
  { title: 'Main Game PC', icon: <MonitorPlay className="w-8 h-8" />, desc: 'Eksplorasi dunia virtual di layar lebar.' },
  { title: 'Game MOBA', icon: <Gamepad2 className="w-8 h-8" />, desc: 'Adu mekanik dan strategi tim yang intens.' },
  { title: 'Nonton Film', icon: <Film className="w-8 h-8" />, desc: 'Menikmati sinematografi dan alur cerita epik.' },
  { title: 'Dengerin Musik', icon: <Music className="w-8 h-8" />, desc: 'Merasakan irama dan melodi sebagai inspirasi.' },
  { title: 'Olahraga', icon: <Dumbbell className="w-8 h-8" />, desc: 'Menjaga kebugaran dan keseimbangan hidup.' },
  { title: 'Tidur', icon: <MoonStar className="w-8 h-8" />, desc: 'Recharge energi untuk produktivitas esok hari.' },
  { title: 'Tour', icon: <Map className="w-8 h-8" />, desc: 'Berpetualang dan mencari pengalaman baru di luar ruangan.' },
];

const Hobbies = () => {
  const scrollRef = useRef(null);
  const { scrollYProgress } = useScroll({
    target: scrollRef,
    offset: ["start end", "end start"]
  });

  const x = useTransform(scrollYProgress, [0, 1], ["0%", "-30%"]);
  const xReverse = useTransform(scrollYProgress, [0, 1], ["-30%", "0%"]);

  return (
    <section ref={scrollRef} className="py-32 overflow-hidden bg-gradient-to-b from-chrome-dark via-[#0f0f0f] to-chrome-dark relative">
      <div className="container mx-auto px-6 mb-16">
        <h2 className="text-sm uppercase tracking-[0.3em] text-chrome-neon mb-4 font-semibold">Minat</h2>
        <h3 className="text-4xl md:text-5xl font-bold text-white">Di Luar Kode.</h3>
      </div>

      <div className="flex flex-col gap-8">
        <motion.div style={{ x }} className="flex gap-6 px-6 whitespace-nowrap min-w-max">
          {hobbies.slice(0, 4).map((hobby, i) => (
            <div key={i} className="interactive w-[400px] h-[200px] rounded-2xl glass-panel chrome-border flex flex-col justify-between p-8 group hover:-translate-y-2 transition-transform duration-500">
              <div className="text-chrome-neon opacity-70 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300 transform origin-left">
                {hobby.icon}
              </div>
              <div>
                <h4 className="text-2xl font-bold text-white mb-2">{hobby.title}</h4>
                <p className="text-chrome-silver/60 text-sm whitespace-normal">{hobby.desc}</p>
              </div>
            </div>
          ))}
          {/* Duplicate for infinite feel */}
          {hobbies.slice(0, 4).map((hobby, i) => (
            <div key={`dup-${i}`} className="interactive w-[400px] h-[200px] rounded-2xl glass-panel flex flex-col justify-between p-8 border border-white/5 opacity-50">
              <div className="text-chrome-neon/50">
                {hobby.icon}
              </div>
              <div>
                <h4 className="text-2xl font-bold text-white/50 mb-2">{hobby.title}</h4>
                <p className="text-chrome-silver/40 text-sm whitespace-normal">{hobby.desc}</p>
              </div>
            </div>
          ))}
        </motion.div>

        <motion.div style={{ x: xReverse }} className="flex gap-6 px-6 whitespace-nowrap min-w-max -ml-[200px]">
          {hobbies.slice(4, 7).map((hobby, i) => (
            <div key={i} className="interactive w-[400px] h-[200px] rounded-2xl glass-panel chrome-border flex flex-col justify-between p-8 group hover:-translate-y-2 transition-transform duration-500">
              <div className="text-chrome-neon opacity-70 group-hover:opacity-100 group-hover:scale-110 transition-all duration-300 transform origin-left">
                {hobby.icon}
              </div>
              <div>
                <h4 className="text-2xl font-bold text-white mb-2">{hobby.title}</h4>
                <p className="text-chrome-silver/60 text-sm whitespace-normal">{hobby.desc}</p>
              </div>
            </div>
          ))}
           {/* Duplicate for infinite feel */}
           {hobbies.slice(4, 7).map((hobby, i) => (
            <div key={`dup2-${i}`} className="interactive w-[400px] h-[200px] rounded-2xl glass-panel flex flex-col justify-between p-8 border border-white/5 opacity-50">
              <div className="text-chrome-neon/50">
                {hobby.icon}
              </div>
              <div>
                <h4 className="text-2xl font-bold text-white/50 mb-2">{hobby.title}</h4>
                <p className="text-chrome-silver/40 text-sm whitespace-normal">{hobby.desc}</p>
              </div>
            </div>
          ))}
        </motion.div>
      </div>
    </section>
  );
};

export default Hobbies;
