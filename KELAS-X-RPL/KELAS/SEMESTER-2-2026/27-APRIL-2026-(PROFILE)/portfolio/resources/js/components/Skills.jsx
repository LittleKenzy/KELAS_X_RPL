import React from 'react';
import { motion } from 'framer-motion';
import { Code2, Layers, Cpu, Layout, Terminal, Zap } from 'lucide-react';

const skills = [
  { name: 'Ekosistem React', level: 95, icon: <Code2 className="w-6 h-6 text-chrome-neon" />, description: 'Arsitektur komponen, Hooks, Manajemen state, Next.js.' },
  { name: 'Animasi Lanjutan', level: 90, icon: <Zap className="w-6 h-6 text-chrome-neon" />, description: 'GSAP, Framer Motion, Three.js, Canvas.' },
  { name: 'UI/UX Engineering', level: 88, icon: <Layout className="w-6 h-6 text-chrome-neon" />, description: 'Tailwind CSS, Styled Components, Sistem Desain.' },
  { name: 'Integrasi Laravel', level: 85, icon: <Layers className="w-6 h-6 text-chrome-neon" />, description: 'Template Blade, Inertia, Pengembangan API, Routing.' },
  { name: 'Arsitektur Sistem', level: 80, icon: <Cpu className="w-6 h-6 text-chrome-neon" />, description: 'Vite, Webpack, CI/CD, Optimasi performa.' },
  { name: 'Terminal / Backend', level: 75, icon: <Terminal className="w-6 h-6 text-chrome-neon" />, description: 'Node.js, Express, Server Linux, Bash.' }
];

const containerVariants = {
  hidden: { opacity: 0 },
  show: {
    opacity: 1,
    transition: { staggerChildren: 0.1 }
  }
};

const itemVariants = {
  hidden: { opacity: 0, y: 30 },
  show: { opacity: 1, y: 0, transition: { type: "spring", stiffness: 100 } }
};

const Skills = () => {
  return (
    <section className="py-24 relative z-10 bg-gradient-to-b from-transparent via-chrome-dark/80 to-transparent backdrop-blur-md">
      <div className="container mx-auto px-6">
        <div className="mb-16 text-center">
          <h2 className="text-sm uppercase tracking-[0.3em] text-chrome-neon mb-4 font-semibold">Persenjataan</h2>
          <h3 className="text-4xl md:text-5xl font-bold text-white">Penguasaan Teknis.</h3>
        </div>

        <motion.div 
          variants={containerVariants}
          initial="hidden"
          whileInView="show"
          viewport={{ once: true, margin: "-100px" }}
          className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
        >
          {skills.map((skill, index) => (
            <motion.div 
              key={index} 
              variants={itemVariants}
              className="interactive group relative p-6 rounded-2xl glass-panel chrome-border hover:bg-white/5 transition-colors overflow-hidden"
            >
              <div className="absolute inset-0 bg-gradient-to-br from-chrome-neon/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              
              <div className="relative z-10">
                <div className="w-12 h-12 rounded-xl bg-black/50 border border-white/10 flex items-center justify-center mb-6 shadow-inner">
                  {skill.icon}
                </div>
                <h4 className="text-xl font-bold text-white mb-2">{skill.name}</h4>
                <p className="text-chrome-silver/60 text-sm mb-6 h-10">{skill.description}</p>
                
                <div className="w-full h-1 bg-black/50 rounded-full overflow-hidden">
                  <motion.div 
                    initial={{ width: 0 }}
                    whileInView={{ width: `${skill.level}%` }}
                    viewport={{ once: true }}
                    transition={{ duration: 1.5, delay: 0.5, ease: "circOut" }}
                    className="h-full bg-gradient-to-r from-chrome-neon/50 to-chrome-neon rounded-full"
                  />
                </div>
              </div>
            </motion.div>
          ))}
        </motion.div>
      </div>
    </section>
  );
};

export default Skills;
