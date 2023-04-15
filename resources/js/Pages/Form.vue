<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import RadioInput from '@/Components/RadioInput.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';


const user = usePage().props.auth.user;
console.log(user);
const form = useForm({
    name: user.name,
    Furigana: user.Furigana,
    year: user.year,
    month: user.month,
    day: user.day,
    gender: user.gender,
    email: user.email,
    preferContact: "",
    LINEID: "",
    postCode: "",
    district: "",
    city: "",
    address: "",
    apartmentName: "",
    postCodeCom: "",
    districtCom: "",
    cityCom: "",
    addressCom: "",
    apartmentNameCom: "",
    telephoneCom: "",
    bankName: "",
    branchName: "",
    teleBranch: "",
    typeAccount: "",
    account: "",
    accountName: "",
});

const submit = () => {
    form.post(route('thanks-sender'));
};

</script>

<template>
    <Head title="Form" />
    <AuthenticatedLayout>
        <div class="container mt-11">
            <h1 class="text-5xl font-bold text-gray-900">本登録用のフォーム（お申し込み用）</h1>
            <form @focusout="validate" @submit.prevent="submit"
                class="w-full px-[4rem] py-[4rem] border border-slate-500 rounded-sm">
                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="name" value="名前" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※お名前を漢字でご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="name" v-model="form.name" type="text" autocomplete="name" />
                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="Furigana" value="フリガナ" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※お名前のフリガナをご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="Furigana" v-model="form.Furigana" type="text" autocomplete="Furigana" />
                        <InputError class="mt-2" :message="form.errors.Furigana" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="" value="生年月日" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class="w-3/5 ">
                        <div class="flex gap-10 w-full">
                            <SelectInput required min="1900" max="2004" v-model="form.year" opDefault="年" id="year" />
                            <SelectInput required min="1" max="12" v-model="form.month" opDefault="月" id="month" />
                            <SelectInput required min="1" max="31" v-model="form.day" opDefault="日" id="day" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.year || form.errors.month || form.errors.day" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="gender" value="生年月日" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class=" w-3/5">
                        <div class="flex gap-20 w-full">
                            <RadioInput required v-model="form.gender" name="gender" id="male" label="男性" />
                            <RadioInput required v-model="form.gender" name="gender" id="female" label="女性" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.gender" />
                    </div>
                </div>


                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="email" value="メールアドレス" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※半角英数字でご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="email" v-model="form.email" type="email" autocomplete="email" />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="preferContact" value="ご希望の連絡方法" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class=" w-3/5">
                        <div class="flex gap-20 w-full">
                            <RadioInput required v-model="form.preferContact" name="preferContact" id="typeEmale" value="メール" />
                            <RadioInput required v-model="form.preferContact" name="preferContact" id="line" value="LINE" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.preferContact" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="LINEID" value="LINE ID" class=" text-3xl font-bold" />
                        </div>
                        <p class=" text-gray-500 text-xl">※半角英数字で8文字以上でご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="LINEID" name="LINEID" v-model="form.LINEID" type="text" autocomplete="LINEID" />
                        <InputError class="mt-2" :message="form.errors.LINEID" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center">お住まいの情報</h2>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="postCode" value="郵便番号" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <div class="flex w-full items-center gap-6">
                            <TextInput required class="w-1/4" size="4" maxlength="3" name="postCode1" type="number" />
                            -
                            <TextInput required class="w-1/4" id="postCode" name="postCode2" v-model="form.postCode" size="5"
                                maxlength="4" type="number"
                                onkeyup="AjaxZip3.zip2addr('postCode1','postCode2','district','city','address');"
                                autocomplete="postCode" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.postCode" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="district" value="都道府県" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <select required name="district"
                            class="focus:border-indigo-500 rounded-md shadow-sm mt-1 block h-[6.4rem] bg-gray-100 text-3xl border-none w-1/2">
                            <option value="" selected disabled>都道府県</option>
                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.district" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="city" value="市区町村" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="city" name="city" v-model="form.city" type="text" autocomplete="city" />
                        <InputError class="mt-2" :message="form.errors.city" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="address" value="番地" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="address" name="address" v-model="form.address" type="text" autocomplete="address" />
                        <InputError class="mt-2" :message="form.errors.address" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="apartmentName" value="マンション名・部屋番号" class=" text-3xl font-bold" />
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="apartmentName" name="apartmentName" v-model="form.apartmentName" type="text"
                            autocomplete="apartmentName" />
                        <InputError class="mt-2" :message="form.errors.apartmentName" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center">勤務先の情報</h2>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="postCodeCom" value="郵便番号" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <div class="flex w-full items-center gap-6">
                            <TextInput required class="w-1/4" size="4" maxlength="3" name="postCodeCom1" type="number" />
                            -
                            <TextInput required class="w-1/4" id="postCode" name="postCodeCom2" v-model="form.postCode" size="5"
                                maxlength="4" type="number"
                                onkeyup="AjaxZip3.zip2addr('postCodeCom1','postCodeCom2','districtCom','cityCom','addressCom');"
                                autocomplete="postCode" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.postCodeCom" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="districtCom" value="都道府県" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <select required name="districtCom"
                            class="focus:border-indigo-500 rounded-md shadow-sm mt-1 block h-[6.4rem] bg-gray-100 text-3xl border-none w-1/2">
                            <option value="" selected disabled>都道府県</option>
                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                        </select>
                        <InputError class="mt-2" :message="form.errors.districtCom" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="cityCom" value="市区町村" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="cityCom" name="cityCom" v-model="form.cityCom" type="text" autocomplete="cityCom" />
                        <InputError class="mt-2" :message="form.errors.cityCom" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="addressCom" value="番地" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="addressCom" name="addressCom" v-model="form.addressCom" type="text"
                            autocomplete="addressCom" />
                        <InputError class="mt-2" :message="form.errors.addressCom" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="apartmentNameCom" value="マンション名・部屋番号" class=" text-3xl font-bold" />
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="apartmentNameCom" name="apartmentNameCom" v-model="form.apartmentNameCom" type="text"
                            autocomplete="apartmentNameCom" />
                        <InputError class="mt-2" :message="form.errors.apartmentNameCom" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="telephoneCom" value="電話番号" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="telephoneCom" name="telephoneCom" v-model="form.telephoneCom" type="number"
                            autocomplete="telephoneCom" />
                        <InputError class="mt-2" :message="form.errors.telephoneCom" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center">口座番号</h2>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="bankName" value="銀行名" class=" text-3xl font-bold" />
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="bankName" name="bankName" v-model="form.bankName" type="text"
                            autocomplete="bankName" />
                        <InputError class="mt-2" :message="form.errors.bankName" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="branchName" value="支店名" class=" text-3xl font-bold" />
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="branchName" name="branchName" v-model="form.branchName" type="text"
                            autocomplete="branchName" />
                        <InputError class="mt-2" :message="form.errors.branchName" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="teleBranch" value="支店番号" class=" text-3xl font-bold" />
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="teleBranch" name="teleBranch" v-model="form.teleBranch" type="text"
                            autocomplete="teleBranch" />
                        <InputError class="mt-2" :message="form.errors.teleBranch" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-b border-t-slate-400 border-b-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="typeAccount" value="口座の種類" class=" text-3xl font-bold" />
                            <p class=" text-3xl font-medium text-red-500">必須</p>
                        </div>
                    </div>
                    <div class=" w-3/5">
                        <div class="flex gap-20 w-full">
                            <RadioInput required v-model="form.typeAccount" name="typeAccount" id="normal" value="普通" />
                            <RadioInput required v-model="form.typeAccount" name="typeAccount" id="temporary" value="当座" />
                        </div>
                        <InputError class="mt-2" :message="form.errors.typeAccount" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="account" value="口座番号" class=" text-3xl font-bold" />
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="account" name="account" v-model="form.account" type="number"
                            autocomplete="account" />
                        <InputError class="mt-2" :message="form.errors.account" />
                    </div>
                </div>

                <div class="flex justify-between p-[2rem] border-t border-t-slate-400 gap-x-24">
                    <div class="grow">
                        <div class="flex justify-between mb-8">
                            <InputLabel for="accountName" value="口座名義(カナ)" class=" text-3xl font-bold" />
                        </div>
                        <p class=" text-gray-500 text-xl">※上記と同じパスワードを再度ご入力</p>
                    </div>
                    <div class="w-3/5">
                        <TextInput required id="accountName" name="accountName" v-model="form.accountName" type="number"
                            autocomplete="accountName" />
                        <InputError class="mt-2" :message="form.errors.accountName" />
                    </div>
                </div>

                <h2 class="text-4xl my-20 text-center">個人情報の写真添付</h2>

                <div class="flex flex-col items-start justify-end mt-4 p-[2rem] gap-6">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
