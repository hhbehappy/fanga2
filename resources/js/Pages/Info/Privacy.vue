<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
<BasicLayout>
  <Head :title="'プライバシーポリシー'" />

  <div class="min-h-screen w-screen max-w-[1320px] bg-gray-100 py-10">
    <div class="w-11/12 md:w-9/12 max-w-3xl mx-auto p-2 bg-white">
      <div class="mx-auto">
        <div class="w-full px-2 space-y-3">
          <h1 class="pb-1 font-bold md:text-xl text-gray-700 leading-tight border-b-4 border-gray-400">プライバシーポリシー</h1>
          <p>「FANGA」（以下、「当サイト」と言います。）では、ユーザーからお預かりする個人情報の重要性を強く認識し、個人情報の保護に関する法律、その他の関係法令を遵守すると共に、以下に定めるプライバシーポリシーに従って、個人情報を安全かつ適切に取り扱うことを宣言いたします。</p>
          <h2 class="font-bold">1. 個人情報の管理</h2>
          <p>ユーザーからお預かりした個人情報は、不正アクセス、紛失、漏えい等が起こらないよう、慎重かつ適切に管理します。</p>
          <h2 class="font-bold">2.個人情報の利用目的</h2>
          <p>当サイトでは、ユーザーからのお問い合わせや会員登録を通じてお名前(ニックネーム)やメールアドレスの個人情報をご提供いただく場合があります。その場合は、以下に示す利用目的のために、適正に利用するものと致します。</p>
          <ul class="pl-8 space-y-2 list- list-disc">
            <li>ユーザーまたは利用者からのお問い合わせ等に対応するため。</li>
            <li>当サイトのサービス向上・改善、新サービスを検討するための分析等を行うため。</li>
            <li>個人を識別できない形で統計データを作成し、当サイトおよび利用者の参考資料とするため。</li>
          </ul>
          <h2 class="font-bold">3.個人情報の第三者提供</h2>
          <p>ユーザーからお預かりした個人情報を、個人情報保護法その他の法令に基づき開示が認められる場合を除き、ご本人様の同意を得ずに第三者に提供することはありません。</p>
          <h2 class="font-bold">4.Cookie（クッキー）について</h2>
          <p>Cookieとは、利用者のサイト閲覧履歴を、利用者のコンピュータにデータとして保存しておく仕組みです。</p>
          <p>クッキーの受け入れを希望されない場合は、ブラウザの設定で変更することができますが、一部のサービスや機能がご利用いただけなくなります。なお、Cookieに保存されている情報から利用者個人を特定することはできません。</p>
          <h2 class="font-bold">5.本プライバシーポリシーの変更</h2>
          <p>当サイトは、法令の制定、改正等により、本プライバシーポリシーを適宜見直し、予告なく変更する場合があります。本プライバシーポリシーの変更は、変更後の本プライバシーポリシーが当サイトに掲載された時点、またはその他の方法により変更後の本プライバシーポリシーが閲覧可能となった時点で有効になります。</p>
          <h2 class="font-bold">附則</h2>
          <p>本プライバシーポリシーは2023年2月26日から適用されます。</p>
          <p>[制定日:2023年2月26日]</p>
          <!-- <p>[最終改定日:2023年3月1日]</p> -->
        </div>
      </div>
    </div>
  </div>
</BasicLayout>
</template>