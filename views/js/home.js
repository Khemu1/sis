let buttons = document.querySelectorAll("button");
let logo = document.querySelector(".logo");
let selectedValue = document.querySelector("selected");
const homeDisplayed = sessionStorage.getItem("homeDisplayed");

let fetchedData;
let info;
let courses;

let home1;

let about1 = `<div class="about">
          <div class=" about-container">
            <h3>Our Servers</h3>
            <div class="img-container">
              <img src="../../assets/images/dedicated-server-bg.jpg">
            </div>
            <p>We understand the critical importance of data <b>security, speed, and reliability</b>. That's why we
              leverage
              dedicated servers to power our platform, ensuring uncompromising performance and stability. With dedicated
              servers, we provide exclusive resources solely for the use of our system, eliminating the risks associated
              with shared hosting environments. This approach allows us to guarantee high-speed data access, robust
              security measures, and unparalleled uptime, providing our users with a seamless and dependable experience.
              Our commitment to utilizing dedicated servers underscores our dedication to safeguarding your data and
              delivering optimal performance at all times </p>
          </div>
          <div class=" about-container">
            <h3>Our Security System</h3>
            <div class="img-container">
              <img src="../../assets/images/security.webp">
            </div>
            <p>we prioritize the security of our users' data above all else. Our comprehensive security system is
              designed
              to safeguard sensitive information and protect against potential threats. Utilizing state-of-the-art
              encryption protocols, multi-factor authentication, and continuous monitoring, we ensure that your data
              remains secure at all times. Our proactive approach to security includes regular security audits,
              vulnerability assessments, and rapid response to emerging threats. With robust firewalls, intrusion
              detection systems, and real-time threat intelligence, we mitigate risks and maintain the integrity of our
              platform. Rest assured, your information is in safe hands with <b>Kemet</b> </p>
          </div>
          <div class="about-container">
            <h3>Stable Connection</h3>
            <div class="img-container">
              <img src="../../assets/images/importance-of-a-reliable-internet-connection-for-business-TeleCloud.png">
            </div>
            <p>At <b>Kemet</b>, we understand the significance of a stable connection in today's digital age. That's why
              we
              prioritize ensuring a reliable and secure connection for all users. With our robust infrastructure and
              dedicated team, we guarantee a seamless online experience, enabling students, teachers, and administrators
              to access our platform anytime, anywhere. Our commitment to maintaining a stable connection reflects our
              dedication to facilitating smooth communication, efficient collaboration, and uninterrupted access to
              essential educational resources.</p>
          </div>
          <div class="about-container">
            <h3>Maintenance</h3>
            <div class="img-container">
              <img src="../../assets/images/matintenance.png">
            </div>
            <p>Ensuring optimal performance and reliability of our systems is paramount at SIS. Our proactive approach
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

let courses1;
buttons.forEach((button) => {
  button.addEventListener("click", () => {
    displayContent(button.value);
    changeLogo(button.value);
    buttons.forEach((button) => {
      button.classList.remove("selected");
    });
    button.classList.add("selected");
  });
});

logo.addEventListener("click", () => {
  if (document.querySelector(".selected").value !== "home") {
    document
      .querySelector("section")
      .removeChild(document.querySelector("section").firstElementChild); // stick with first element because it there are any whitespaces they will consirded the first child
    displayHome();
  }
  buttons.forEach((button) => {
    button.classList.remove("selected");
  });
  document.querySelector(".main").classList.remove("hide");
  document;
  document;
  let home = document.querySelector("#home");
  home.classList.add("selected");
});

function changeLogo(Buttonvalue) {
  if (Buttonvalue !== "home") {
    let main = document.querySelector(".main");
    main.classList.add("hide");
  } else {
    let main = document.querySelector(".main");
    main.classList.remove("hide");
  }
}

// Fetch data from the backend
async function fetchData() {
  try {
    const response = await fetch("../../controller/dashboard.php");
    if (!response.ok) {
      throw new Error("Something is wrong with the response");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.log("Something went wrong with fetching data:", error);
  }
}

async function fetchDataAndUpdateVariable() {
  try {
    fetchedData = await fetchData();
    info = fetchedData[1];
    courses = fetchedData[2];

    if (fetchedData[0] === "student") {
      home1 = `<div class="basic-info">
      <h2>Student Information</h2>
      <div class="student-info">
        <div class="info-item" id="username">Username: ${info.userName} </div>
        <div class="info-item" id="name">Name: ${info.name} </div>
        <div class="info-item" id="address">Address: ${info.address} </div>
        <div class="info-item" id="level">Level: ${info.level} </div>
      </div>
    </div>`;
      courses1 = `<div class="courses">
  <h2>Enrolled Courses</h2>
  <div class="courses-info">
    <div class="course">
      <p>Name</p>
      <p>Hours</p>
      <p>Level</p>
    </div>`;

      courses.forEach((course) => {
        courses1 += `
    <div class="course">
      <p>${course.name}</p>
      <p>${course.hours}</p>
      <p>${course.level}</p>
    </div>`;
      });

      courses1 += `
  </div>
</div>`;
    } else {
      home1 = `<div class="basic-info">
      <h2>Student Information</h2>
      <div class="student-info">
        <div class="info-item" id="username">Username: ${info.userName} </div>
        <div class="info-item" id="name">Name: ${info.name} </div>
        <div class="info-item" id="address">Address: ${info.address} </div> 
      </div>
    </div>`;
    }
    displayHome();
  } catch (error) {
    console.error("Error:", error);
  }
}

// Update UI based on button clicked
function displayContent(buttonValue) {
  let selected = document.querySelector(".selected").value;
  let section = document.querySelector("section");
  let basicInfo = document.querySelector(".basic-info");
  let aboutinfo = document.querySelector(".about");
  let courses = document.querySelector(".courses");
  let footer = document.querySelector("footer");

  if (buttonValue === "home" && selected !== "home") {
    if (aboutinfo) section.removeChild(aboutinfo);
    if (courses) section.removeChild(courses);

    let tempDiv = document.createElement("div");
    tempDiv.innerHTML = home1;
    let aboutNode = tempDiv.firstChild;
    console.log("aboutNode:", aboutNode);
    section.insertBefore(aboutNode, footer);
    console.log("adding home");
  }
  if (buttonValue === "about" && selected !== "about") {
    if (basicInfo) section.removeChild(basicInfo);
    if (courses) section.removeChild(courses);

    let tempDiv = document.createElement("div");
    tempDiv.innerHTML = about1;
    let aboutNode = tempDiv.firstChild;
    console.log("aboutNode:", aboutNode);
    section.insertBefore(aboutNode, footer);
    console.log("adding home");
  }

  if (buttonValue === "courses" && selected !== "courses") {
    if (basicInfo) section.removeChild(basicInfo);
    if (aboutinfo) section.removeChild(aboutinfo);

    let tempDiv = document.createElement("div");
    tempDiv.innerHTML = courses1;
    let aboutNode = tempDiv.firstChild;
    console.log("aboutNode:", aboutNode);
    section.insertBefore(aboutNode, footer);
    console.log("adding home");
  }
}
function displayHome() {
  let section = document.querySelector("section");
  let footer = document.querySelector("footer");
  let tempDiv = document.createElement("div");
  tempDiv.innerHTML = home1;
  let aboutNode = tempDiv.firstChild;
  console.log("aboutNode:", aboutNode);
  section.insertBefore(aboutNode, footer);
}
// Fetch data and update variable
fetchDataAndUpdateVariable();
