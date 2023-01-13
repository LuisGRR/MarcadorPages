// let url = "http://localhost/MarcadorPages/Ubicasion/Ubicasiones";

// let whitelist = [];

// fetch(url)
//   .then((response) => response.json())
//   .then((result) => {
//     for (const item of result) {
//       whitelist.push(item);
//     }
//   })
//   .catch((err) => console.log("Solicitud fallida", err));

// The DOM element you wish to replace with Tagify
var input = document.querySelector("input[name=basic]");

// initialize Tagify on the above input node reference
new Tagify(input);
