import * as utils from "./Utils.js";
utils.checkHomeTheme(localStorage.getItem("theme"));
document.querySelector(".theme-switcher").addEventListener("click", () => {
  utils.homeThemeSwticher();
});

let about = `<div class="about">
          <div class=" about-container">
            <h3 ${
              localStorage.getItem("theme") === "dark" ? "class= font-dark" : ""
            } </h3>
            <div class="img-container">
              <img src="../../assets/images/dedicated-server-bg.jpg">
            </div>
            <p ${
              localStorage.getItem("theme") === "dark" ? "class= font-dark" : ""
            }>We understand the critical importance of data <b>security, speed, and reliability</b>. That's why we
              leverage
              dedicated servers to power our platform, ensuring uncompromising performance and stability. With dedicated
              servers, we provide exclusive resources solely for the use of our system, eliminating the risks associated
              with shared hosting environments. This approach allows us to guarantee high-speed data access, robust
              security measures, and unparalleled uptime, providing our users with a seamless and dependable experience.
              Our commitment to utilizing dedicated servers underscores our dedication to safeguarding your data and
              delivering optimal performance at all times </p>
          </div>
          <div class=" about-container">
            <h3 ${
              localStorage.getItem("theme") === "dark" ? "class= font-dark" : ""
            }>Our Security System</h3>
            <div class="img-container">
              <img src="../../assets/images/security.webp">
            </div>
            <p ${
              localStorage.getItem("theme") === "dark" ? "class= font-dark" : ""
            }>we prioritize the security of our users' data above all else. Our comprehensive security system is
              designed
              to safeguard sensitive information and protect against potential threats. Utilizing state-of-the-art
              encryption protocols, multi-factor authentication, and continuous monitoring, we ensure that your data
              remains secure at all times. Our proactive approach to security includes regular security audits,
              vulnerability assessments, and rapid response to emerging threats. With robust firewalls, intrusion
              detection systems, and real-time threat intelligence, we mitigate risks and maintain the integrity of our
              platform. Rest assured, your information is in safe hands with <b>Kemet</b> </p>
          </div>
          <div class="about-container">
            <h3 ${
              localStorage.getItem("theme") === "dark" ? "class= font-dark" : ""
            }>Stable Connection</h3>
            <div class="img-container">
              <img src="../../assets/images/importance-of-a-reliable-internet-connection-for-business-TeleCloud.png">
            </div>
            <p ${
              localStorage.getItem("theme") === "dark" ? "class= font-dark" : ""
            }>At <b>Kemet</b>, we understand the significance of a stable connection in today's digital age. That's why
              we
              prioritize ensuring a reliable and secure connection for all users. With our robust infrastructure and
              dedicated team, we guarantee a seamless online experience, enabling students, teachers, and administrators
              to access our platform anytime, anywhere. Our commitment to maintaining a stable connection reflects our
              dedication to facilitating smooth communication, efficient collaboration, and uninterrupted access to
              essential educational resources.</p>
          </div>
          <div class="about-container">
            <h3 ${
              localStorage.getItem("theme") === "dark" ? "class= font-dark" : ""
            }>Maintenance</h3>
            <div class="img-container">
              <img src="../../assets/images/matintenance.png">
            </div>
            <p ${
              localStorage.getItem("theme") === "dark" ? "class= font-dark" : ""
            }>Ensuring optimal performance and reliability of our systems is paramount at SIS. Our proactive approach
              to
              maintenance encompasses regular checks, updates, and fine-tuning of our infrastructure to prevent downtime
              and minimize disruptions. With a dedicated team of experts overseeing our maintenance operations, we
              swiftly
              address any potential issues before they escalate, keeping our systems running smoothly. By prioritizing
              preventative maintenance, we uphold our commitment to providing a seamless and uninterrupted user
              experience
              for students, teachers, and administrators alike. </p>
          </div>
        </div>`;
let section = document.querySelector("section");
let tempDiv = document.createElement("div");
tempDiv.innerHTML = about;
let aboutNode = tempDiv.firstElementChild;
section.appendChild(aboutNode);
