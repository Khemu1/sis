/**
 * used to switch themes in forms
 */
export function formthemes() {
  if (document.documentElement.classList.contains("light")) {
    document.documentElement.classList.remove("light");
    document.documentElement.classList.add("dark");
    document.querySelector("input.theme-switcher").checked = true;
  } else if (document.documentElement.classList.contains("dark")) {
    document.documentElement.classList.remove("dark");
    document.documentElement.classList.add("light");
    document.querySelector("input.theme-switcher").checked = false;
  } else {
    if (
      window.matchMedia &&
      window.matchMedia("(prefers-color-scheme: dark)").matches
    ) {
      document.documentElement.classList.add("dark");
      document.querySelector("input.theme-switcher").checked = true;
    } else {
      document.documentElement.classList.add("light");
      document.querySelector("input.theme-switcher").checked = false;
    }
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

export function checkFormTheme() {
  // if (localStorage.getItem("theme") == "white") {
  //   document.documentElement.classList.remove("dark");
  //   document.documentElement.classList.add("light");
  //   document.querySelector("input.theme-switcher").checked = false;
  //   return;
  // }
  // document.documentElement.classList.remove("light");
  // document.documentElement.classList.add("dark");
  // localStorage.setItem("theme", "dark");
  // document.querySelector("input.theme-switcher").checked = true;
  // return;
}

export function themeDectector() {
  const prefersDarkMode =
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: dark)").matches;

  // Check if the user prefers light mode
  const prefersLightMode =
    window.matchMedia &&
    window.matchMedia("(prefers-color-scheme: light)").matches;

  // Determine the current theme
  let currentTheme;
  if (prefersDarkMode) {
    currentTheme = "dark";
    console.log("dark");
  } else if (prefersLightMode) {
    currentTheme = "light";
    console.log("light");
  } else {
    // Fallback in case the browser doesn't support the prefers-color-scheme media feature
    // or the user hasn't explicitly set a preference
    currentTheme = "default";
    console.log("none");
  }
}
