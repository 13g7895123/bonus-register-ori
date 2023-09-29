<style>
.alert_box {
    width: 400px;
    height: 200px;
    background: #fff;
    border-radius: 6px;
    position: absolute;
    top: 50%;
    left: 50%;
    transition: all .2s ease-in-out;
    transform: translate(-50%, -50%) scale(0.1);
    text-align: center;
    padding: 0 30px 30px;
    color: #333;
    display: flex;
    flex-direction: column;
    align-content: center;
    visibility: hidden;
}

.alert_box img {
    width: 100px;
    margin-top: -50px;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
}

.alert_box h2 {
    font-size: 38px;
    font-weight: 500;
    margin: 60px 0 10px;
}

.open_box{
    visibility: visible;
    top: 50%;
    transform: translate(-50%, -50%) scale(1);
}

.close_box{
    visibility: hidden;
    top: 50%;
    transform: translate(-50%, -50%) scale(0.1);
}
</style>
<div class="alert_box">
    <img src='../assets/images/success.png'>
    <h2 id='alert_title'>Title</h2>
    <p id='alert_text'>texttexttexttexttext</p>
</div>
<script src='./Pages/js/alert.js'></script>