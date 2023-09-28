<style>
    .container {
        width: 100%;
        height: 100%;
        background: #3c5077;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .alert_box {
        width: 400px;
        background: #fff;
        border-radius: 6px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        padding: 0 30px 30px;
        color: #333;
    }

    .alert_box img {
        width: 100px;
        margin-top: -50px;
        border-radius: 50%;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .alert_box h2 {
        font-size: 38px;
        font-weight: 500;
        margin: 30px 0 10px;
    }
</style>
<div class="container">
    <div class="alert_box">
        <img src='../assets/images/success.png'>
        <h2 id='alert_title'>Title</h2>
        <p id='alert_text'>texttexttexttexttext</p>
    </div>
</div>