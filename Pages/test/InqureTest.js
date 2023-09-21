const code = '	A012458100';

export const addTestBtn = () => {

    $('#btns').append(`
        <div id='btnTest' class='btn bg-blue-400 hover:bg-blue-500 hover:text-white hover:font-bold'>測試</div>
    `);

    $('#btnTest').click(() => {
        $('#code').val(code)
        $('#btn_require').click()
    });    
}

