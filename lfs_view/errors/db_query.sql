select u.uuid,u.is_active,u.type,u.first_name,u.last_name,u.email_id,u.phone as UserType from user u where u.uuid='9920d2fc-a39e-46b5-abfa-d0b0a76a09ee' and  u.is_active=1


select * from user where type='Distributor';
select * from distributor_agent_company_mapping;
select * from company_user_role_mapping;
select * from company_user_mapping where uuid='650e8357-589f-45db-b4bd-c7fcf3ab2671';

select ct.uuid,ct.from_company_id,ct.to_company_id,ct.created_at,ct.amount from company_transaction ct where ct.from_company_id=''

select e.uuid,e.flight_booking_id,e.earning_amount,e.created_at,e.created_by from earning e where user_id=''


select * from airline_markup;
select * from segment_markup;
select * from passanger_markup;

select uuid,company_name from company_details where is_active=true


SELECT m.company_id,u.*
FROM user u
left outer join company_user_mapping m on u.uuid = m.user_id
where u.user_name ='varun.bhayana'