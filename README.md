If upgrading to the 5.7 laravel version

run

alter table `abilities` add `scope` int null after `only_owned`;
alter table `roles` add `scope` int null after `level`;
alter table `permissions` add `scope` int null after `forbidden`;
alter table `assigned_roles` add `scope` int null
