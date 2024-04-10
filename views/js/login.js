const form = document.querySelector("form");

form.addEventListener("submit", async (e) => {
  e.preventDefault();
  let formD = new FormData(form);
  let username = formD.get("username");
  let password = formD.get("password");
  let result = await fetch("../../controller/login.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      login: "Joe amama",
      username: username,
      password: password,
    }),
  });

  // Handle the response
  if (result.ok) {
    let responseData = await result.json();
    let stat = responseData.status;
    console.log(responseData);
    console.log(stat);
    if (stat == "success") {
      window.location.href = "http://localhost:8080/sis/home.php";
    } else {
      console.log(responseData.message);
    }
  } else {
    console.error("Error: " + result.statusText);
  }
});
