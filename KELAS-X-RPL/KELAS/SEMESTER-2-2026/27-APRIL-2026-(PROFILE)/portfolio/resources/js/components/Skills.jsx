import React from 'react';
import { motion } from 'framer-motion';
import { Code2, Layers, Cpu, Layout, Terminal, Zap } from 'lucide-react';
import useApi from '../hooks/useApi';
import { skillsApi } from '../api';

const iconMap = {
  Code2: <Code2 className="w-6 h-6 text-chrome-neon" />,
  Layers: <Layers className="w-6 h-6 text-chrome-neon" />,
  Cpu: <Cpu className="w-6 h-6 text-chrome-neon" />,
  Layout: <Layout className="w-6 h-6 text-chrome-neon" />,
  Terminal: <Terminal className="w-6 h-6 text-chrome-neon" />,
  Zap: <Zap className="w-6 h-6 text-chrome-neon" />
};

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
  const { data: skills, loading, error } = useApi(() => skillsApi.getAll());

  if (loading) {
    return (
      <section className="py-24 relative z-10 bg-gradient-to-b from-transparent via-chrome-dark/80 to-transparent backdrop-blur-md">
        <div className="container mx-auto px-6 animate-pulse">
            <div className="h-8 w-32 mx-auto bg-white/10 rounded-full mb-12"></div>
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                {[1,2,3,4,5,6].map(i => (
                    <div key={i} className="h-48 rounded-2xl bg-white/5 border border-white/5"></div>
                ))}
            </div>
        </div>
      </section>
    );
  }

  if (error) {
    return (
        <section className="py-24 text-center">
            <div className="inline-block text-red-400 font-medium bg-red-400/10 px-6 py-4 rounded-xl border border-red-400/20">
                ⚠️ Error memuat skill: {error}
            </div>
        </section>
    );
  }

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
          {skills?.map((skill) => (
            <motion.div 
              key={skill.id} 
              variants={itemVariants}
              className="interactive group relative p-6 rounded-2xl glass-panel chrome-border hover:bg-white/5 transition-colors overflow-hidden"
            >
              <div className="absolute inset-0 bg-gradient-to-br from-chrome-neon/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              
              <div className="relative z-10">
                <div className="w-12 h-12 rounded-xl bg-black/50 border border-white/10 flex items-center justify-center mb-6 shadow-inner">
                  {iconMap[skill.icon] || <Code2 className="w-6 h-6 text-chrome-neon" />}
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
