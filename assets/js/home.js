console.log(window.location.href);
let fetchedData;
let home1;
let about = `<div class="about">
          <div class=" about-container">
            <h3>Our Reliabile Connection</h3>
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
            <h3 >Stable Connection</h3>
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

// Fetching data from the backend
async function fetchData() {
  try {
    const response = await fetch("../../controllers/dashboard.php");
    if (!response.ok) {
      throw new Error("Something is wrong with the response");
    }
    const data = await response.json();
    console.log(data);
    return data;
  } catch (error) {
    console.log("Something went wrong with fetching data:", error);
  }
}

async function fetchDataAndUpdateVariable() {
  try {
    fetchedData = await fetchData();
    let info = fetchedData[1];
    let courses = fetchedData[2];
    if (fetchedData[0] === "student") {
      studentContent(info, courses);
    } else {
      teacherContent(info, courses);
    }
    await displayContent();
  } catch (error) {
    console.error("Error:", error);
  }

  // Update UI based on button clicked
  async function displayContent() {
    let section = document.querySelector("section");
    let footer = document.querySelector("footer");
    let url = window.location.href;

    if (url === "http://sis.test/website/home.php") {
      console.log("will display home");
      let tempDiv = document.createElement("div");
      tempDiv.innerHTML = home1;
      let homeNode = tempDiv.firstElementChild;
      section.insertBefore(homeNode, footer);
    }

    if (url === "http://sis.test/website/home.php?page=courses") {
      console.log("will display courses");
      let tempDiv = document.createElement("div");
      tempDiv.innerHTML = courses1;
      let coursesNode = tempDiv.firstElementChild;
      section.insertBefore(coursesNode, footer);
    }

    if (url === "http://sis.test/website/home.php?page=about") {
      console.log("will display about");
      let tempDiv = document.createElement("div");
      tempDiv.innerHTML = about;
      let aboutNode = tempDiv.firstElementChild;
      section.insertBefore(aboutNode, footer);
    }
  }
}

/**
 * used to generate contents for teachers
 * @param {Object} info
 * @param {Object} courses
 */
function studentContent(info, courses) {
  home1 = `<div class="basic-info">
  <h2>Student Information</h2>
  <div class="student-info">
    <p id="username">Username: ${info.userName} </p>
    <p id="name">Name: ${info.name} </p>
    <p id="address">Address: ${info.address} </p> 
    <p id="address">Level: ${info.level} </p> 

  </div>
</div>`;

  courses1 = `<div class="student-table-container">
  <h2>students</h2>
  <div class="student-table-container">
    <div class="students">
      <div>Course</div>
      <div>Level</div>
      <div>Hours</div>
    </div>`;

  courses.forEach((course) => {
    courses1 += `
    <div class="students">
      <div>${course.name}</div>
      <div>${course.level}</div>
      <div>${course.hours}</div>
    </div>`;
  });
  courses1 += `
  </div>
</div>`;
}

function teacherContent(info, courses) {
  home1 = `<div class="basic-info">
  <h2>Teacher Information</h2>
  <div class="teacher-info">
    <p id="username">Username: ${info.userName} </p>
    <p id="name">Name: ${info.name} </p>
    <p id="address">Address: ${info.address} </p> 
  </div>
</div>`;

  courses1 = `<div class=""student-table-container>
  <h2>Enrolled Students</h2>
  <div class="enrolled-students">
    <div class="students">
      <p>Course</p>
      <p>Level</p>
      <p>Hours</p>
      <p>Student Name</p>
      </div> 
    `;

  courses.forEach((course) => {
    courses1 += `
    <div class="students">
      <p>${course.courseName}</p>
      <p>${course.courseLevel}</p>
      <p>${course.courseHours}</p>
      <p>${course.studentUserName}</p>
    </div>`;
  });
  courses1 += `
  </div>
</div>`;
}

// Fetch data and update variables
fetchDataAndUpdateVariable();
