
-- SETTINGS

SET @iTypeId = (SELECT `ID` FROM `sys_options_types` WHERE `name` = 'bx_organizations' LIMIT 1);
SET @iCategId = (SELECT `ID` FROM `sys_options_categories` WHERE `type_id` = @iTypeId LIMIT 1);
DELETE FROM `sys_options` WHERE `category_id` = @iCategId;
DELETE FROM `sys_options_categories` WHERE `type_id` = @iTypeId;
DELETE FROM `sys_options_types` WHERE `id` = @iTypeId;

-- PAGES

DELETE FROM `sys_objects_page` WHERE `module` = 'bx_organizations';
DELETE FROM `sys_pages_blocks` WHERE `module` = 'bx_organizations' OR `object` IN('bx_organizations_create_profile', 'bx_organizations_delete_profile', 'bx_organizations_edit_profile', 'bx_organizations_edit_profile_cover', 'bx_organizations_view_profile', 'bx_organizations_profile_info', 'bx_organizations_profile_friends', 'bx_organizations_home');

-- MENU

DELETE FROM `sys_objects_menu` WHERE `module` = 'bx_organizations';
DELETE FROM `sys_menu_sets` WHERE `module` = 'bx_organizations';
DELETE FROM `sys_menu_items` WHERE `module` = 'bx_organizations' OR `set_name` IN('bx_organizations_view_submenu', 'bx_organizations_submenu', 'bx_organizations_view_actions', 'bx_organizations_view_actions_more');

-- ACL
DELETE `sys_acl_actions`, `sys_acl_matrix` FROM `sys_acl_actions`, `sys_acl_matrix` WHERE `sys_acl_matrix`.`IDAction` = `sys_acl_actions`.`ID` AND `sys_acl_actions`.`Module` = 'bx_organizations';
DELETE FROM `sys_acl_actions` WHERE `Module` = 'bx_organizations';

-- VIEWS
DELETE FROM `sys_objects_view` WHERE `Name` = 'bx_organizations';

-- SEARCH
DELETE FROM `sys_objects_search` WHERE `ObjectName` = 'bx_organizations';

-- GRIDS
DELETE FROM `sys_objects_grid` WHERE `object` IN ('bx_organizations_administration', 'bx_organizations_moderation');
DELETE FROM `sys_grid_fields` WHERE `object` IN ('bx_organizations_administration', 'bx_organizations_moderation');
DELETE FROM `sys_grid_actions` WHERE `object` IN ('bx_organizations_administration', 'bx_organizations_moderation');