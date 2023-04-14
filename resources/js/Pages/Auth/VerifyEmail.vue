<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link } from '@inertiajs/vue3';


</script>

<template>
    <GuestLayout>
        <Head title="Email Verification" />

        <div class="mb-4 text-3xl font-bold text-center leading-normal">
            仮登録<br>
            送信完了<br>
            この度はお申し込み頂き誠にありがとうございます。<br>
            現状、仮登録を完了しメールアドレスへ確認用の自動メールを送信しました。<br>
            自動メールをご確認後、本登録へお進みください。					
		</div>
        <Link :href="route('login')">TOPへ戻る</Link>
    </GuestLayout>
</template>
