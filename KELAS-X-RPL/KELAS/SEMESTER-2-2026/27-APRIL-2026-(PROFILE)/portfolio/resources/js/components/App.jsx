import React, { useEffect, useRef } from 'react';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import CustomCursor from './CustomCursor';
import Hero from './Hero';
import WhoAmI from './WhoAmI';
import Skills from './Skills';
import Hobbies from './Hobbies';
import Personality from './Personality';
import DailyVibe from './DailyVibe';
import LifeMotto from './LifeMotto';
import Footer from './Footer';

gsap.registerPlugin(ScrollTrigger);

const App = () => {
  const mainRef = useRef(null);

  useEffect(() => {
    let ctx = gsap.context(() => {
      // Global smooth scroll setup could go here if using a smooth scroll library like Lenis
      // For now, standard scrolling with GSAP scroll triggers on components
    }, mainRef);

    return () => ctx.revert();
  }, []);

  return (
    <div ref={mainRef} className="relative w-full bg-chrome-dark min-h-screen text-chrome-silver selection:bg-chrome-neon/30 selection:text-white">
      <CustomCursor />
      
      {/* Background glow effects */}
      <div className="fixed top-[-20%] left-[-10%] w-[50%] h-[50%] bg-chrome-neon/10 blur-[120px] rounded-full pointer-events-none mix-blend-screen" />
      <div className="fixed bottom-[-20%] right-[-10%] w-[50%] h-[50%] bg-blue-600/10 blur-[120px] rounded-full pointer-events-none mix-blend-screen" />
      
      <div className="relative z-10 w-full flex flex-col">
        <Hero />
        <WhoAmI />
        <Skills />
        <Hobbies />
        <Personality />
        <DailyVibe />
        <LifeMotto />
        <Footer />
      </div>
    </div>
  );
};

export default App;
