<?php

namespace backend\enum;

class Permissions
{
    const CONTACT_CREATE = 'contact-create';
    const CONTACT_DELETE = 'contact-delete';
    const CONTACT_READ = 'contact-read';
    const CONTACT_UPDATE = 'contact-update';
    const COUNTRY_CREATE = 'country-create';
    const COUNTRY_DELETE = 'country-delete';
    const COUNTRY_READ = 'country-read';
    const COUNTRY_UPDATE = 'country-update';
    const CREATE_USER = 'create-user';
    const DELETE_USER = 'delete-user';
    const MANAGE_CONTACTS = 'manageContacts';
    const RESTORE_MODEL = 'restore-model';
    const UPDATE_USER = 'update-user';
    const VIEW_DASHBOARD = 'viewDashboard';

    const MANAGE_USER = 'managerUser';
}