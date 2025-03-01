<x-dashboard-layout>
  <x-widget>
    <x-return-button href="{{ route('account.index') }}">
      一覧に戻る
    </x-return-button>

    <form class="flex flex-col p-6" action="{{ route('account.store') }}" method="POST">
      @csrf
      <div class="text-xl font-bold">
        アカウント追加
      </div>
      <hr class="mb-2 w-11/12">
      <div class="grid gap-4 p-2">
        <label class="flex flex-col gap-2">
          ログインID（社員番号も可）
          <input class="rounded-md border border-slate-300 px-3 py-2 font-normal" name="login_id" type="text"
            value="{{ old('login_id') }}" required>
          @error('login_id')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </label>

        <div>
          <label class="mb-2 block">パスワード</label>
          <div class="relative">
            <input
              class="block w-full rounded-md border border-slate-300 py-3 pe-10 ps-4 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
              name="password" type="password">
            <button
              class="absolute inset-y-0 end-0 z-20 flex cursor-pointer items-center rounded-e-md px-3 text-gray-400"
              type="button">
            </button>
          </div>
        </div>
        @error('password')
          <div class="font-normal text-red-500">{{ $message }}</div>
        @enderror

        <div x-data="{ showPasswordConfirmation: false }">
          <label class="mb-2 block">パスワード確認</label>
          <div class="relative">
            <input
              class="block w-full rounded-md border border-slate-300 py-3 pe-10 ps-4 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50"
              name="password_confirmation" type="password">
            <button
              class="absolute inset-y-0 end-0 z-20 flex cursor-pointer items-center rounded-e-md px-3 text-gray-400"
              type="button">
            </button>
          </div>
        </div>
        @error('password_confirmation')
          <div class="font-normal text-red-500">{{ $message }}</div>
        @enderror

        <div class="flex flex-col">
          契約区分
          <div class="ms-4 mt-1 grid w-52 grid-cols-2 items-center">
            <label class="flex items-center">
              <input class="form-radio text-indigo-600" name="contract_type" type="radio" value="正社員"
                {{ old('contract_type') == '正社員' ? 'checked' : '' }}>
              <span class="ml-1">正社員</span>
            </label>
            <label class="flex items-center">
              <input class="form-radio text-indigo-600" name="contract_type" type="radio" value="契約社員"
                {{ old('contract_type') == '契約社員' ? 'checked' : '' }}>
              <span class="ml-1">契約社員</span>
            </label>
            <label class="flex items-center">
              <input class="form-radio text-indigo-600" name="contract_type" type="radio" value="パート"
                {{ old('contract_type') == 'パート' ? 'checked' : '' }}>
              <span class="ml-1">パート</span>
            </label>
            <label class="flex items-center">
              <input class="form-radio text-indigo-600" name="contract_type" type="radio" value="アルバイト"
                {{ old('contract_type') == 'アルバイト' ? 'checked' : '' }}>
              <span class="ml-1">アルバイト</span>
            </label>
          </div>
          @error('contract_type')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </div>
        <div class="flex flex-col">
          管理者権限
          <div class="ms-4 mt-1 grid w-52 grid-cols-2 items-center">
            <label class="flex items-center">
              <input class="form-radio text-indigo-600" name="role" type="radio" value="1"
                {{ old('role') == 'admin' ? 'checked' : '' }}>
              <span class="ml-1">管理者</span>
            </label>
            <label class="flex items-center">
              <input class="form-radio text-indigo-600" name="role" type="radio" value="2"
                {{ old('role') == 'member' ? 'checked' : '' }}>
              <span class="ml-1">一般</span>
            </label>
          </div>

          @error('role')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </div>
      </div>
      <hr class="my-2 w-11/12">
      <div class="grid gap-4 p-2">
        <label class="flex flex-col gap-2">
          名前
          <input class="rounded-md border border-slate-300 px-3 py-2 font-normal" name="name" type="text"
            value="{{ old('name') }}" required>
          @error('name')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </label>
        <label class="flex flex-col gap-2">
          名前（フリガナ）
          <input class="rounded-md border border-slate-300 px-3 py-2 font-normal" name="name_kana" type="text"
            value="{{ old('name_kana') }}">
          @error('name_kana')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </label>
        <label class="flex flex-col gap-2">
          郵便番号
          <input class="rounded-md border border-slate-300 px-3 py-2 font-normal" name="post_code" type="text"
            value="{{ old('post_code') }}">
          @error('post_code')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </label>
        <label class="flex flex-col gap-2">
          住所
          <input class="rounded-md border border-slate-300 px-3 py-2 font-normal" name="address" type="text"
            value="{{ old('address') }}">
          @error('address')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </label>
        <label class="flex flex-col gap-2">
          電話番号
          <input class="rounded-md border border-slate-300 px-3 py-2 font-normal" name="phone_number" type="text"
            value="{{ old('phone_number') }}">
          @error('phone_number')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </label>
        <label class="flex flex-col gap-2">
          生年月日
          <input
            class="js-datepicker rounded-md border border-slate-300 px-3 py-2 font-normal read-only:cursor-not-allowed"
            name="birthday" type="text" value="{{ old('birthday') }}">
          @error('birthday')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </label>
        <label class="flex flex-col gap-2">
          入社日
          <input
            class="js-datepicker rounded-md border border-slate-300 px-3 py-2 font-normal read-only:cursor-not-allowed"
            name="hire_date" type="text" value="{{ old('hire_date') }}">
          @error('hire_date')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </label>
      </div>
      <hr class="my-2 w-11/12">
      <div class="grid gap-4 p-2">
        <label class="flex flex-col gap-2">
          緊急連絡先　氏名
          <input class="rounded-md border border-slate-300 px-3 py-2 font-normal" name="emergency_name"
            type="text" value="{{ old('emergency_name') }}">
          @error('emergency_name')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </label>
        <label class="flex flex-col gap-2">
          緊急連絡先
          <input class="rounded-md border border-slate-300 px-3 py-2 font-normal" name="emergency_phone_number"
            type="text" value="{{ old('emergency_phone_number') }}">
          @error('emergency_phone_number')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </label>
        <label class="flex flex-col gap-2">
          緊急連絡先の続柄
          <input class="rounded-md border border-slate-300 px-3 py-2 font-normal" name="emergency_relationship"
            type="text" value="{{ old('emergency_relationship') }}">
          @error('emergency_relationship')
            <div class="font-normal text-red-500">{{ $message }}</div>
          @enderror
        </label>
      </div>
      <button
        class="mx-auto mt-4 max-w-48 rounded-md bg-blue-600 px-6 py-2 text-center font-semibold text-white disabled:cursor-not-allowed disabled:opacity-50"
        type="submit">
        追加する
      </button>
    </form>
  </x-widget>
</x-dashboard-layout>
