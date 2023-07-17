
const checkboxes = document.querySelectorAll('.mycheck');
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        const mailId = this.dataset.mailId
        const mailItem = document.getElementById(`mail-${mailId}`);
        mailItem.classList.toggle('selected-mail', this.checked);
        ToolsActive()
    });
});

function ToolsActive(){
    let checksActive = 0;
    checkboxes.forEach(checkbox => {
        if(checkbox.checked)
        {
            checksActive += 1;
        }
    });
    if(checksActive > 0){
        const toolsitems = document.querySelectorAll(`.tool-item`);
        
        toolsitems.forEach(item => {
            item.classList.remove("tools-display-none");
        });
    }else{
        const toolsitems = document.querySelectorAll(`.tool-item`);
        
        toolsitems.forEach(item => {
            item.classList.add("tools-display-none");
        });
    }
}

const checkTool = document.getElementById(`check-tool`);
const selectTool = document.getElementById(`select-tool`);
checkTool.addEventListener('change', function() {
    const isChecked = checkTool.checked;
    const selectedValue = selectTool.value;
    if (selectedValue === "1") {
        checkboxes.forEach(checkbox => {
        setCheckboxStatus(checkbox, isChecked,1);

    })
    } else if (selectedValue === "2") {
        checkboxes.forEach(checkbox => {
        setCheckboxStatus(checkbox, isChecked,2);
    })
    } else if (selectedValue === "3") {
        checkboxes.forEach(checkbox => {
        setCheckboxStatus(checkbox, isChecked,3);
    })
    }
    ToolsActive()
});

function setCheckboxStatus(checkbox, isChecked,modo) {
    const mailId = checkbox.dataset.mailId;
    const mailItem = document.getElementById(`mail-${mailId}` );
    if(modo===1){
        checkbox.checked = isChecked;
        mailItem.classList.toggle('selected-mail', isChecked);


    }else if(modo === 2 && mailItem.classList.contains('importante'))
    {
        checkbox.checked = isChecked;
        mailItem.classList.toggle('selected-mail', isChecked);
        
    }else if(modo === 3 && mailItem.classList.contains('visto'))
    {
        checkbox.checked = isChecked;
        mailItem.classList.toggle('selected-mail', isChecked);
        
    }
    
}