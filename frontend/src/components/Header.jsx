import React, { useState } from 'react';

const Header = () => {
  const [navOpen, setNavOpen] = useState(false);

  const openNav = () => {
    setNavOpen(!navOpen);
  };

  return (
    <header>
      <nav>
        <a href="index.html">Shapel</a>
        <button onClick={openNav}>
          <span> </span>
          <span> </span>
          <span> </span>
        </button>
        <div id="myNav" style={{ display: navOpen ? 'block' : 'none' }}>
          <a href="index.html">Home</a>
          <a href="about.html">About</a>
          <a href="gallery.html">Gallery</a>
          <a href="service.html">Service</a>
          <a href="blog.html">Blog</a>
        </div>
      </nav>
    </header>
  );
};

export default Header;
