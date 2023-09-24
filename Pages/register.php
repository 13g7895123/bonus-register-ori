<form id="form_area">
        <div class="inp_group mt-3">
            <input v-model='account' @blur="accountRule" required>
            <span class="column">遊戲帳號</span>
            <span class="notice text-red">{{ accountValidation }}</span>
            <i></i>
        </div>
        <div class="inp_group mt-2">
            <input v-model='password' @blur="passwordRule" @valid="passwordRule" @focus="passwordFocus" type="password" required>
            <span class="column">{{ passwordColumn }}</span>
            <span class="notice text-red">{{ passwordValidation }}</span>
            <i></i>
        </div>
        <div class="inp_group mt-2">
            <input v-model = 'checkPassword' type="password" required style="white-space: normal;">
            <span class="column">確認密碼</span>
            <i></i>
        </div>
        <div class="inp_group mt-2">
            <VueDatePicker 
                v-model='birthday' 
                :format="dateFormat"
                placeholder="出生年月日"
                hide-input-icon
                auto-apply
                :enable-time-picker="false"
            />
            <i></i>
        </div>
        <div class="inp_group mt-2">
            <input v-model = 'code' required>
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
        <div 
            class="bg-white rounded flex justify-center items-center btn py-1 mt-6"
            @click = "submit"
            >提交註冊</div>
        <div
            class="bg-white rounded flex justify-center items-center btn py-1 mt-3"
            @click = "router.push({ path: `/phonevalidation/${server}` })"
            >取消註冊</div>
    </form>