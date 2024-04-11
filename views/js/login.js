const form = document.querySelector("form");

form.addEventListener("submit", async (e) => {
  console.log("eeeeeeeeee");
  e.preventDefault();
  let formD = new FormData(form);
  let user = document.querySelector('input[name="userType"]:checked');
  let type = user.value; // disregard that error it doesn't exist

  let username = formD.get("username");
  let password = formD.get("password");
  form.append("type", type);
  let result = await fetch("../../controller/login.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      login: "Joe amama",
      userName: username,
      password: password,
      type: type
    }),
  });

  // Handle the response
  if (result.ok) {
    let responseData = await result.json();
    let stat = responseData.status;
    console.log(responseData);
    console.log(stat);
    if (stat == "success") {
      let setIdResult = await fetch("../../controller/login.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ id: responseData.id }), // Send the user ID to the server
      });
      console.log(responseData.id);
      // Only redirect after the second fetch request completes
      if (setIdResult.ok) {
        window.location.href = `http://localhost/sis/views/php/home.php?id=${responseData.id}&type=${responseData.type}`;
      } else {
        console.error("Error setting user ID: " + setIdResult.statusText);
      }
    } else {
      console.log(responseData.message);
    }
  } else {
    console.error("Error: " + result.statusText);
  }
});
