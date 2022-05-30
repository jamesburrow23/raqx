<template>
    <div class="min-h-full">
        <Disclosure as="nav" class="bg-indigo-600" v-slot="{ open }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-300.svg" alt="Workflow" />
                        </div>

                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a v-for="item in navigation"
                                   :key="item.name"
                                   :href="item.href"
                                   :class="[item.current ? 'bg-indigo-700 text-white' : 'text-white hover:bg-indigo-500 hover:bg-opacity-75', 'px-3 py-2 rounded-md text-sm font-medium']"
                                   :aria-current="item.current ? 'page' : undefined"
                                >
                                    {{ item.name }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="-mr-2 flex md:hidden">
                        <DisclosureButton class="bg-indigo-600 inline-flex items-center justify-center p-2 rounded-md text-indigo-200 hover:text-white hover:bg-indigo-500 hover:bg-opacity-75 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-600 focus:ring-white">
                            <span class="sr-only">Open main menu</span>
                            <MenuIcon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
                            <XIcon v-else class="block h-6 w-6" aria-hidden="true" />
                        </DisclosureButton>
                    </div>
                </div>
            </div>

            <DisclosurePanel class="md:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <DisclosureButton v-for="item in navigation"
                                      :key="item.name"
                                      as="a"
                                      :href="item.href"
                                      :class="[item.current ? 'bg-indigo-700 text-white' : 'text-white hover:bg-indigo-500 hover:bg-opacity-75', 'block px-3 py-2 rounded-md text-base font-medium']"
                                      :aria-current="item.current ? 'page' : undefined"
                    >
                        {{ item.name }}
                    </DisclosureButton>
                </div>
            </DisclosurePanel>
        </Disclosure>

        <slot name="header" />

        <main>
            <slot />
        </main>
    </div>
</template>

<script>
import { Disclosure, DisclosureButton, DisclosurePanel, Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { BellIcon, MenuIcon, XIcon } from '@heroicons/vue/outline'

const navigation = [
    { name: 'Dashboard', href: route('dashboard') },
    { name: 'Matches', href: route('matches.index') },
    { name: 'Games', href: route('games.index') },
]

export default {
    components: {
        Disclosure,
        DisclosureButton,
        DisclosurePanel,
        Menu,
        MenuButton,
        MenuItem,
        MenuItems,
        BellIcon,
        MenuIcon,
        XIcon,
    },
    setup() {
        return {
            navigation,
        }
    },
}
</script>
