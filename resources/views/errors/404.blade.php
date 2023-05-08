<x-error>
  <x-slot name="title">
    ご指定のページが見つかりませんでした
  </x-slot>

  <div class="min-h-screen w-screen bg-gray-100 py-10">
    <div class="w-11/12 md:w-9/12 max-w-3xl mx-auto p-2 bg-white text-gray-700">
      <div class="mx-auto">
        <section class="w-full px-2 space-y-3">
          <h1 class="pb-1 font-bold md:text-xl leading-tight border-b-4 border-gray-400">
            ご指定のページが見つかりませんでした。</h1>
          <p>お探しのページは、移動または削除された可能性があります。</p>
          <p>入力されたアドレスを今一度ご確認ください。</p>
          <p class="">
            <a href="{{ route('fanga') }}" class="text-blue-500">トップページ</a>へ
          </p>
        </section>
      </div>
    </div>
  </div>
</x-error>