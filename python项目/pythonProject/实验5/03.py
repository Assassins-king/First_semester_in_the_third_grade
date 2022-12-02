class InsurancePolicy:
    def __init__(self, price_of_item):
        self.price_of_insured_item = price_of_item


class VehicleInsurance(InsurancePolicy):
    vehicle_Name = ""
    def __init__(self, price_of_item):
        super(VehicleInsurance, self).__init__(price_of_item)
    def get_rate(self):
        return  self.price_of_insured_item*0.001

class HomeInsurance(InsurancePolicy):
    member_number = 0

    def __init__(self, price_of_item):
        super(HomeInsurance, self).__init__(price_of_item)

    def get_rate(self):
        return self.price_of_insured_item* 0.0005


if __name__=='__main__':
    vi=VehicleInsurance(10000)
    print("回报率是%d" %vi.get_rate())

    hi=HomeInsurance(200000)
    print("回报率是%d" %hi.get_rate())