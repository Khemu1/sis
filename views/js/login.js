const form = document.querySelector("form");

form.addEventListener("submit", async (e) => {
  console.log("eeeeeeeeee");
  e.preventDefault();
  let formD = new FormData(form);
  let user = document.querySelector('input[name="userType"]:checked');
  let type = user.value; // disregard that error it doesn't exist

  let username = formD.get("userName");
  let password = formD.get("password");

  const hiddenInput = document.createElement("input");

  hiddenInput.type = "hidden";

  hiddenInput.name = "type";

  hiddenInput.value = type;

  form.appendChild(hiddenInput);
  let result = await fetch("../../controller/login.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      login: "Joe amama",
      userName: username,
      password: password,
      type: type,
    }),
  });

  // Handle the response
  if (result.ok) {
    let responseData = await result.json();
    let stat = responseData.status;
    if (stat == "success") {
      window.location.href = `http://sis.test/views/php/home.php`;
    } else {
      console.log(responseData.message);
    }
  } else {
    console.error("Error: " + result.statusText);
  }
});
