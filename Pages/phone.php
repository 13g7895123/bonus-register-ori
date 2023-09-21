<div id='bg' class="w-screen h-screen">
    <div id="phone-validation-box" class="rounded-lg">
        <div id="mask"></div>
        <h2 class="text-white mt-12">註冊帳號</h2>
        <h3 id='server_name' class="text-white mt-3"></h3>
        <form id="form_area">
            <div class="inp_group mt-3">
                <input v-model = 'phone' required>
                <span class="">手機號碼</span>
                <i></i>
            </div>
            <div class="inp_group mt-2">
                <input v-model = 'validationCode' required>
                <span class="column">驗證碼</span>
                <i style="width: 58%;"></i>
                <IdentifyCode
                    ref="identify"
                    class="code-box"
                    :contentWidth="110"
                    :contentHeight="40"
                    @updateIdentifyCode="setIdentifyCode"
                    >
                </IdentifyCode>
            </div>
            <div class="inp_group mt-2">
                <input v-model = 'code' required>
                <span>認證碼</span>
                <i style="width: 60%;"></i>
                <div id='btn_send_code' class="btn" @click="sendCode">發送認證碼</div>
            </div>
            <div class="bg-white rounded flex justify-center items-center btn py-1 mb-2 mt-6" @click="submit">送出</div>
            <hr class="mt-5">
            <div
                class="bg-white rounded flex justify-center items-center btn py-1 mt-5"
                @click = "router.push('/forgetPassword')"
                >找回密碼</div>
            <div 
                class="bg-white rounded flex justify-center items-center btn py-1 mt-3"
                @click = ""
                >客服中心</div>
        </form>
    </div>
</div>