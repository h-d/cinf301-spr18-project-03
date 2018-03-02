/*
 * See https://stackoverflow.com/questions/45656949/how-to-return-the-row-and-column-index-of-a-table-cell-by-clicking
 * which includes a Jquery solution too.
 */

//Sets cookie variables on click for use in PHP functions
//Hudson DeVoe


window.onload = function() {

    //Create consts for HTML elements

    const table = document.querySelector('table');
    const rows = document.querySelectorAll('tr');
    const button = document.querySelector('button');
    const rowsArray = Array.from(rows);


    //Event listeners for tiles


    table.addEventListener('click', (event) => {
        const rowIndex = rowsArray.findIndex(row => row.contains(event.target));
        const columns = Array.from(rowsArray[rowIndex].querySelectorAll('td'));
        const columnIndex = columns.findIndex(column => column == event.target);
        console.log(rowIndex, columnIndex);

        document.cookie = 'Index=' + ((3 * rowIndex) + columnIndex);
        location.reload();
    })


    //Event listener for randomize button

    button.addEventListener('click', (event)=> {
        document.cookie = 'Randomize=' + true;
        location.reload();
    })
}