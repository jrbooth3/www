ALTER TABLE tdi.rawdata ADD INDEX(vehicle,date,mileage);
ALTER TABLE tdi.maintenance ADD INDEX(item,date,mileage,vehicle);