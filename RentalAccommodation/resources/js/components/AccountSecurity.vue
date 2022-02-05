<template>
    <div class="security-and-login-layout">
        <p>This is the Security and Login tab </p>
        <section class="settings-menu">
            <b-list-group >
                <h2>Settings</h2>
                <br />
                <b-list-group-item to="/myAccount/general"> General </b-list-group-item>
                <b-list-group-item to="/myAccount/security"> Security and Login </b-list-group-item>
                <b-list-group-item to="/myAccount/deleteAccount"> Delete Account </b-list-group-item>
            </b-list-group>
        </section>
        <!-- Need to implement functions with js -->
        <section class="settings-options">
            <div class="container mx-auto mt-4">
                <h1>General Account Settings</h1>
                <br />
                <b-list-group>
                    <b-list-group-item><b-button v-b-toggle.collapse-changePassword block class="d-flex"><strong>Change password</strong>
                        <strong v-if="isVisible" aria-hidden="true" class="ml-auto">-</strong>
                        <strong v-else aria-hidden="true" class="ml-auto">+</strong>
                        </b-button>
                        <b-collapse id="collapse-changePassword" v-model="isVisible">
                            <b-card title="Change Password">
                                content
                            </b-card>
                        </b-collapse>
                    </b-list-group-item>
                    <b-list-group-item> Last Log in: </b-list-group-item>
                <br />
            </div>
        </section>
    </div>
</template>