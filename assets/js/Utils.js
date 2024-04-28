/**
 * used to switch themes in forms
 * @param {String} type
 */
export function formthemes(type) {
  if (type === "login") {
    console.log("login");
    let form = document.querySelector(".container");
    let anchors = document.querySelectorAll("a");
    let ps = document.querySelectorAll("p");
    let h2 = document.querySelectorAll("h2");
    if (!document.body.classList.contains("body-dark")) {
      console.log("going dark");
      document.body.classList.toggle("body-dark");
      form.classList.toggle("container-dark");
      ps.forEach((p) => {
        p.classList.toggle("font-dark");
      });
      anchors.forEach((a) => {
        a.classList.toggle("font-dark");
      });
      document.querySelector("p").classList.toggle("font-dark");
      ps.forEach((p) => {
        p.classList.toggle("font-dark");
      });
      h2.forEach((h) => {
        h.classList.toggle("font-dark");
      });
      document.querySelector("input.theme-switcher").checked = true;
      localStorage.setItem("theme", "dark");
      return;
    }
    console.log("going white");
    document.body.classList.toggle("body-dark");
    form.classList.toggle("container-dark");
    anchors.forEach((a) => {
      a.classList.toggle("font-dark");
    });
    ps.forEach((p) => {
      p.classList.toggle("font-dark");
    });
    h2.forEach((h) => {
      h.classList.toggle("font-dark");
    });
    document.querySelector("input.theme-switcher").checked = false;
    localStorage.setItem("theme", "white");
  }

  if (type === "student") {
    let home = document.querySelector(".container");
    let anchors = document.querySelectorAll("a");
    let ps = document.querySelectorAll("p");

    if (document.body.classList.contains("body-dark")) {
      document.body.classList.remove("body-dark");
      home.classList.remove("container-dark");
      anchors.forEach((a) => {
        a.classList.remove("font-dark");
      });
      ps.forEach((p) => {
        p.classList.remove("font-dark");
      });
      document.querySelector("p").classList.remove("font-dark");
      document.querySelector("input.theme-switcher").checked = true;
      document.querySelector(".main").classList.toggle("hide");
      localStorage.setItem("theme", "white");
      return;
    }
    document.body.classList.add("body-dark");
    home.classList.add("container-dark");
    anchors.forEach((a) => {
      a.classList.add("font-dark");
    });
    ps.forEach((p) => {
      p.classList.add("font-dark");
    });
    document.querySelector("input.theme-switcher").checked = false;
    document.querySelector(".main").classList.toggle("hide");
    localStorage.setItem("theme", "dark");
  }

  if (type === "teacher") {
    let home = document.querySelector(".container");
    let anchors = document.querySelectorAll("a");
    let labels = document.querySelectorAll("label");
    let ps = document.querySelectorAll("p");

    if (document.body.classList.contains("body-dark")) {
      document.body.classList.remove("body-dark");
      home.classList.remove("container-dark");
      anchors.forEach((a) => {
        a.classList.remove("font-dark");
      });
      labels.forEach((l) => {
        l.classList.remove("font-dark");
      });
      ps.forEach((p) => {
        p.classList.remove("font-dark");
      });
      document.querySelector("p").classList.remove("font-dark");
      document.querySelector("input.theme-switcher").checked = true;
      document.querySelector(".main").classList.toggle("hide");
      localStorage.setItem("theme", "white");
      return;
    }
    document.body.classList.add("body-dark");
    home.classList.add("container-dark");
    anchors.forEach((a) => {
      a.classList.add("font-dark");
    });
    labels.forEach((l) => {
      l.classList.add("font-dark");
    });
    ps.forEach((p) => {
      p.classList.add("font-dark");
    });
    document.querySelector("input.theme-switcher").checked = false;
    document.querySelector(".main").classList.toggle("hide");
    localStorage.setItem("theme", "dark");
  }
}
/**
 * Switches the theme of the home page.
 * @returns {void} - This method does not return any value.
 */
export function homeThemeSwticher() {
  let nav = document.querySelector("nav");
  let section = document.querySelector("section");
  let footer = document.querySelector("footer");
  let anchors = document.querySelectorAll("a");
  let headers = document.querySelectorAll("h3");
  let students = document.querySelectorAll(".student");
  let courses = document.querySelectorAll(".course");
  let aboutContainers = document.querySelectorAll(".about-container");

  let ps = document.querySelectorAll("p");
  if (document.body.classList.contains("body-dark")) {
    document.body.classList.toggle("body-dark");
    nav.classList.toggle("nav-dark");
    footer.classList.toggle("dark-footer");
    anchors.forEach((a) => {
      a.classList.toggle("font-dark");
    });
    headers.forEach((h) => {
      h.classList.toggle("font-dark");
    });
    ps.forEach((p) => {
      p.classList.toggle("font-dark");
    });
    students.forEach((student) => {
      student.classList.toggle("student-dark");
    });
    courses.forEach((course) => {
      course.classList.toggle("course-dark");
    });
    section.classList.remove("section-dark");
    aboutContainers.forEach((aboutContainer) => {
      aboutContainer.classList.toggle("about-container-dark");
    });
    document.querySelector(".main").classList.toggle("hide");
    document.querySelector("input.theme-switcher").checked = true;
    localStorage.setItem("theme", "white");
    return;
  }
  document.body.classList.toggle("body-dark");
  nav.classList.toggle("nav-dark");
  footer.classList.toggle("dark-footer");
  anchors.forEach((a) => {
    a.classList.toggle("font-dark");
  });
  headers.forEach((h) => {
    h.classList.toggle("font-dark");
  });
  ps.forEach((p) => {
    p.classList.toggle("font-dark");
  });
  students.forEach((student) => {
    student.classList.toggle("student-dark");
  });
  courses.forEach((course) => {
    course.classList.toggle("course-dark");
  });
  section.classList.toggle("section-dark");
  aboutContainers.forEach((aboutContainer) => {
    aboutContainer.classList.toggle("about-container-dark");
  });
  document.querySelector(".main").classList.toggle("hide");
  document.querySelector("input.theme-switcher").checked = false;

  localStorage.setItem("theme", "dark");
}
/**
 * returns the current theme
 * @returns boolean
 */
export function hasDark() {
  return document.body.classList.contains("body-dark");
}

export function checkHomeTheme(theme) {
  let nav = document.querySelector("nav");
  let section = document.querySelector("section");
  let footer = document.querySelector("footer");
  let anchors = document.querySelectorAll("a");
  let headers = document.querySelectorAll("h3");
  let ps = document.querySelectorAll("p");
  let students = document.querySelectorAll(".student");
  let courses = document.querySelectorAll(".course");
  let aboutContainers = document.querySelectorAll(".about-container");

  if (theme !== "dark") {
    console.log(theme);
    console.log("switcing");
    document.body.classList.toggle("body-dark");
    nav.classList.toggle("nav-dark");
    footer.classList.toggle("dark-footer");
    anchors.forEach((a) => {
      a.classList.toggle("font-dark");
    });
    headers.forEach((h) => {
      h.classList.toggle("font-dark");
    });
    ps.forEach((p) => {
      p.classList.toggle("font-dark");
    });
    students.forEach((student) => {
      student.classList.toggle("student-dark");
    });
    courses.forEach((course) => {
      course.classList.toggle("course-dark");
    });
    aboutContainers.forEach((aboutContainer) => {
      aboutContainer.classList.toggle("about-container-dark");
    });
    section.classList.toggle("section-dark");
    document.querySelector(".main").classList.toggle("hide");
    localStorage.setItem("theme", "white");
    document.querySelector("input.theme-switcher").checked = true;
  }
}

export function checkFormTheme(theme, type) {
  if (type === "login") {
    let from = document.querySelector(".container");
    let anchors = document.querySelectorAll("a");
    let h2 = document.querySelectorAll("h2");
    let ps = document.querySelectorAll("p");
    if (theme === "dark") {
      document.body.classList.toggle("body-dark");
      from.classList.toggle("container-dark");
      h2.forEach((h2) => {
        h2.classList.toggle("font-dark");
      });
      anchors.forEach((a) => {
        a.classList.toggle("font-dark");
      });
      ps.forEach((p) => {
        p.classList.toggle("font-dark");
      });
      localStorage.setItem("theme", "dark");
      document.querySelector("input.theme-switcher").checked = true;
      return;
    }
    localStorage.setItem("theme", "white");
  }

  if (type === "student") {
    let home = document.querySelector(".container");
    let anchors = document.querySelectorAll("a");
    if (theme === "white") {
      document.body.classList.remove("body-dark");
      home.classList.remove("container-dark");
      anchors.forEach((a) => {
        a.classList.remove("font-dark");
      });
      document.querySelector("p").classList.remove("font-dark");
      document.querySelector(".main").classList.toggle("hide");
      document.querySelector("input.theme-switcher").checked = false;
      return;
    }
    document.body.classList.add("body-dark");
    home.classList.add("container-dark");
    anchors.forEach((a) => {
      a.classList.add("font-dark");
    });
    document.querySelector("p").classList.add("font-dark");
    document.querySelector("input.theme-switcher").checked = true;
  }

  if (type === "teacher") {
    let home = document.querySelector(".container");
    let anchors = document.querySelectorAll("a");
    let labels = document.querySelectorAll("label");
    if (theme === "white") {
      document.body.classList.remove("body-dark");
      home.classList.remove("container-dark");
      anchors.forEach((a) => {
        a.classList.remove("font-dark");
      });
      labels.forEach((l) => {
        l.classList.remove("font-dark");
      });
      document.querySelector("p").classList.remove("font-dark");
      document.querySelector(".main").classList.toggle("hide");
      document.querySelector("input.theme-switcher").checked = false;
      return;
    }
    document.body.classList.add("body-dark");
    home.classList.add("container-dark");
    anchors.forEach((a) => {
      a.classList.add("font-dark");
    });
    labels.forEach((l) => {
      l.classList.add("font-dark");
    });
    document.querySelector("p").classList.add("font-dark");
    document.querySelector("input.theme-switcher").checked = true;
  }
}
