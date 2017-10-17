<template>
    <Form ref="formInline" :model="formInline" :rules="ruleInline" inline>
        <FormItem prop="user">
            <Input type="text" v-model="formInline.user" placeholder="Username">
                <Icon type="ios-person-outline" slot="prepend"></Icon>
            </Input>
        </FormItem>
        <FormItem prop="password">
            <Input type="password" v-model="formInline.password" placeholder="Password">
                <Icon type="ios-locked-outline" slot="prepend"></Icon>
            </Input>
        </FormItem>
        <FormItem>
            <Button type="primary" @click="handleSubmit('formInline')">登录</Button>
        </FormItem>
    </Form>
</template>
<script>
    export default {
        data () {
            return {
                formInline: {
                    user: '',
                    password: ''
                },
                ruleInline: {
                    user: [
                        { required: true, message: '请填写用户名', trigger: 'blur' }
                    ],
                    password: [
                        { required: true, message: '请填写密码', trigger: 'blur' },
                        { type: 'string', min: 6, message: '密码长度不能小于6位', trigger: 'blur' }
                    ]
                }
            }
        },
        methods: {
            handleSubmit(name) {
                let _this = this;
                this.$refs[name].validate((valid) => {
                    if (valid) {
                        _this.axios.post('/login', _this.myForm).then(function (response) {
                            let data = response.data;
                            if (data.status == 200) {
                                localStorage.setItem('user', JSON.stringify(data.user));
                                _this.$Message.success(data.msg)
                                setTimeout(function () {
                                    _this.$router.push({path: '/'})
                                }, 1000);
                            } else {
                                    _this.$Message.error(data.msg);
                            }
                        }).catch(function (error) {
                            _this.$Message.error('页面已过期，请刷新!');
                        });
                    } else {
                        this.$Message.error('表单验证失败!');
                    }
                })
            }
        },
        created(){
            this.$http.post('http://blog.dev/test1')
            .then(response => {
                console.log(response);
            })
        }
    }
</script>
