import React from 'react';

const Info = () => {
  return (
    <section className="info_section innerpage_info_section">
      <div className="container">
        <div className="row info_main_row">
          <div className="col-md-6 col-lg-3">
            <div className="info_insta">
              <h4>
                <a href="index.html" className="navbar-brand m-0 p-0">
                  <span>Shapel</span>
                </a>
              </h4>
              <p className="mb-0">
                Asperiores at, error, delectus aut voluptatem provident cum quam magni necessitatibus molestias eveniet reprehenderit maiores voluptate.
              </p>
            </div>
          </div>
          <div className="col-md-6 col-lg-3">
            <div className="info_detail">
              <h4>Company</h4>
              <p className="mb-0">
                when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
              </p>
            </div>
          </div>
          <div className="col-md-6 col-lg-3">
            <h4>Contact Us</h4>
            <div className="info_contact">
              <a href="">
                <i className="fa fa-map-marker" aria-hidden="true"></i>
                <span>Location</span>
              </a>
              <a href="">
                <i className="fa fa-phone" aria-hidden="true"></i>
                <span>Call +01 1234567890</span>
              </a>
              <a href="">
                <i className="fa fa-envelope"></i>
                <span>demo@gmail.com</span>
              </a>
            </div>
          </div>
          <div className="col-md-6 col-lg-3">
            <h4>Follow Us</h4>
            <div className="social_box">
              <a href="">
                <i className="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i className="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i className="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i className="fa fa-instagram" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Info;
