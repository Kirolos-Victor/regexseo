<template>

    <div class="container text-center">
        <div class="main">
            <div class="header">
                LOGIN
            </div>
            <div class="btn-group">
                <button class="sign-button active" @click.prevent="resetValidation(),loginPage=true;">SIGN IN</button>
                <button class="sign-button" @click.prevent="resetValidation(),loginPage=false;">SIGN UP</button>
            </div>
            <form id="sign-in-form" v-if="loginPage">
                <div class="email">
                    <div>EMAIL</div>
                    <input type="email" placeholder="your email" class="form-control" name="email"
                           v-model="loginForm.email">
                    <div class="text-danger mt-3" v-if="errors.email != ''">{{ errors.email }}</div>
                </div>
                <div class="password">
                    <div>Password</div>
                    <input type="password" placeholder="your password" class="form-control" name="password"
                           v-model="loginForm.password">
                    <div class="text-danger mt-3" v-if="errors.password != ''">{{ errors.password }}</div>
                </div>
                <button type="submit" @click.prevent="login" class="main-button">SIGN IN</button>
            </form>

            <form id="register-form" v-else>
                <div class="email">
                    <div>name</div>
                    <input type="text" placeholder="your name" class="form-control" name="name"
                           v-model="registerForm.name">
                    <div class="text-danger mt-3" v-if="errors.name != ''">{{ errors.name }}</div>
                </div>
                <div class="email">
                    <div>EMAIL</div>
                    <input type="email" placeholder="your email" class="form-control" name="email"
                           v-model="registerForm.email">
                    <div class="text-danger mt-3" v-if="errors.email != ''">{{ errors.email }}</div>
                </div>
                <div class="password">
                    <div>Password</div>
                    <input type="password" placeholder="your password" class="form-control" name="password"
                           v-model="registerForm.password">
                    <div class="text-danger mt-3" v-if="errors.password != ''">{{ errors.password }}</div>
                </div>
                <div class="password">
                    <div>repeat Password</div>
                    <input type="password" placeholder="repeat your password" class="form-control"
                           name="password_confirmation" v-model="registerForm.password_confirmation">
                </div>
                <div class="check-admin">
                    <input type="checkbox" name="is_admin" true-value="1"
                           false-value="0" v-model="registerForm.is_admin">is admin
                </div>
                <button type="button" class="main-button" @click.prevent="register">SIGN UP</button>

            </form>
        </div>
    </div>


</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            loginPage: true,
            loginForm: {
                email: '',
                password: '',
            },
            registerForm: {
                name: '',
                email: '',
                password: '',
                password_confirmation: '',
                is_admin: 0,
            },
            errors: {
                name: '',
                email: '',
                password: ''
            },
        }
    },
    methods: {
        resetValidation() {
            this.errors = {
                name: '',
                email: '',
                password: ''
            }
        },
        login() {
            this.resetValidation();
            axios.post('/login', this.loginForm).then(() => {
                window.location.reload();
            }).catch(e => {
                this.errors.password = e.response.data.errors.password[0];
                this.errors.email = e.response.data.errors.email[0];
            })
        },
        register() {
            this.resetValidation();
            axios.post('/register', this.registerForm).then(() => {
                window.location.reload();
            }).catch(e => {
                this.errors.password = e.response.data.errors.password[0];
                this.errors.email = e.response.data.errors.email[0];
                this.errors.name = e.response.data.errors.name[0];

            })
        }
    }
}
</script>

<style scoped>
.container {
    color: #000000;
    display: flex;
    justify-content: center;
    align-items: center;
}

.container .header {
    font-weight: 700;
    font-size: 34px;
    line-height: 40px;
    margin-bottom: 48px;
}


.container .main .sign-button {
    width: 184px;
    height: 40px;
    box-sizing: border-box;
    background: #C4C4C4;
    border: 1px solid #C4C4C4;
}

.main .email {
    margin-top: 20px;
}

.main .email div {
    font-weight: 700;
    font-size: 14px;
    line-height: 16px;
    text-transform: uppercase;

}

.form-control {
    font-weight: 700;
    font-size: 12px;
    line-height: 14px;
    text-transform: uppercase;
    width: 368px;
    height: 55px;
    color: #C4C4C4;
    border: 1px solid #C4C4C4;
    background-color: white;
    margin-top: 10px;
}


input[type="text"]::placeholder {
    text-align: center;
}

input[type="email"]::placeholder {
    text-align: center;
}

.main .password {
    margin-top: 10px;
}

.main .password div {
    font-weight: 700;
    font-size: 14px;
    line-height: 16px;
    text-transform: uppercase;

}


input[type="password"]::placeholder {

    text-align: center;
}

.main .main-button {
    width: 368px;
    height: 69px;
    background: #515151;
    border-radius: 500px;
    margin-top: 35px;
    font-weight: 700;
    font-size: 18px;
    line-height: 21px;
    color: white;
    text-transform: uppercase;
}

.check-admin {
    margin-top: 25px;
    font-weight: 700;
    font-size: 14px;
    line-height: 16px;
    text-transform: uppercase;
    color: #515151;
    margin-left: -295px !important;

}

.check-admin input[type='checkbox'] {
    width: 19px;
    height: 13px;
    background-color: #C4C4C4;

    border: 5px solid #000000;

}

.active {
    background-color: #FFFFFF !important;
}
</style>

