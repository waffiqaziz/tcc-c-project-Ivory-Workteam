const parent = document.querySelectorAll("#editparent");
const projID = document.querySelector("#projID");

parent.forEach(button => {
    button.addEventListener("click",()=>{
        let buttonValue = button.getAttribute('bikinan');
        projID.setAttribute("value", buttonValue);
    });
});
