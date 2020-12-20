const parent = document.querySelectorAll("#editparent");
const parentid = document.querySelector("#parentID");
const parentcardid = document.querySelector("#parentcardid");

parent.forEach(button => {
    button.addEventListener("click",()=>{
        let buttonValue = button.getAttribute('bikinan');
        parentid.setAttribute("value",buttonValue);
        parentcardid.setAttribute("value", buttonValue);
    });
});
