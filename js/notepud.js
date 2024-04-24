let textarea = document.getElementById("notepud");
let list = document.getElementById("listNotepud");

let object = [];
let state = {edit: false, key: undefined};

textarea.addEventListener("blur", function() {
    if (state.edit) {
        object[state.key].text = this.value;

        state = {edit: false, key: undefined};
        this.value = '';
    } else {
        let date = new Date;
        let now = addZero(date.getHours()) + ":" + 
        addZero(date.getMinutes()) + ":" + 
        addZero(date.getSeconds()) + " " + 
        addZero(date.getDate()) + "." + 
        addZero(date.getMonth() + 1) + "." + 
        date.getFullYear();
        
        object.push({text: this.value, time: now});

        this.value = '';
    
        let li = document.createElement("li");
        li.dataset.num = object.length - 1;
        li.innerHTML = now;
        list.appendChild(li);

        let self  = this;
        li.addEventListener("click", function() {
            let number = this.dataset.num;
            self.value = object[number].text;
            state = {edit: true, key: number};
        });
    }
});

function addZero(num) {
    if (num >= 0 && num <= 9) {
        return "0" + num;
    } else {
        return num;
    }
};