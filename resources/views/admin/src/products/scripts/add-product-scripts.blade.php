<script>

    let a = document.getElementById('color').value;
    document.getElementById('color').style.background = a;
    (function () {
        for (const editor of document.getElementsByClassName("textEditor")) {
            ClassicEditor.create(editor).catch(error => {
                console.error('error', error);
            });
        }
    })();
</script>

<script>
    checkIfDisabledBtn();

    function checkIfDisabledBtn() {
        let disabled = false;
        let price = document.getElementById('price');
        let code = document.getElementById('code');
        let categoryFlag = false;
        let nameFlag = true;
        let categoryCheckbox = document.getElementsByClassName('check-if-checked-category');
        let nameInputs = document.getElementsByClassName('check-if-empty');
        for (let i = 0; i < categoryCheckbox.length; i++) {
            if (categoryCheckbox[i].checked == true)
                categoryFlag = true;
        }
        for (let j = 0; j < nameInputs.length; j++) {
            if (nameInputs[j].value == '' || nameInputs[j].value == null)
                nameFlag = false;
        }
        if (price.value == '' || price.value == null || code.value == '' || code.value == null || categoryFlag == false || nameFlag == false) {
            disabled = true;
        }
        if (disabled == true)
            document.getElementById('submitButton').classList.add('disabled');
        else
            document.getElementById('submitButton').classList.remove('disabled');

    }

    function selectAllRelated(parent_id, cat_id, currentText, parentText) {
        let currentBox = document.getElementById(currentText + '_' + parent_id + '_' + cat_id),
            parentBox = document.querySelectorAll('[id^="' + parentText + '_"]');
        if (currentBox.checked != true)
            return
        parentBox.forEach(item => {
            let id = item.id
            let parent = item.id.split('_')
            if (parent[2] == parent_id) {
                item.checked = true
                let newParentText;
                if (parent[0] == 'child')
                    newParentText = 'subcategory'
                else if (parent[0] == 'subcategory')
                    newParentText = 'category'
                selectAllRelated(parent[1], parent[2], parent[0], newParentText)
            }
        })
        checkIfDisabledBtn();
    }
</script>
