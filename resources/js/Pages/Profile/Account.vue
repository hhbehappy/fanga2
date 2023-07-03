<script setup>
import BasicLayout from '@/Layouts/BasicLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import LinkTab from './Partials/LinkTab.vue';

const props = defineProps({
  user: Object,
  assetsPath: Object,
  mustVerifyEmail: Boolean,
  status: String
})
</script>

<template>
  <Head :title="'マイページ'" />
  <BasicLayout>
    <div class="max-w-7xl mx-auto mt-5 px-3 md:px-5">
      <section>
        <h1 class="font-bold text-lg md:text-2xl pl-1 border-b-4 border-gray-500">マイページ</h1>
        <LinkTab />
        <div class="p-6 bg-gray-200">
          <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <UpdateProfileInformationForm :must-verify-email="mustVerifyEmail" :status="status" class="max-w-xl" />
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <UpdatePasswordForm class="max-w-xl" />
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
              <DeleteUserForm class="max-w-xl" />
            </div>
          </div>
        </div>
      </section>
    </div>
  </BasicLayout>
</template>