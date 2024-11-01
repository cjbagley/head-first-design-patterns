class GumballMachine:
    def __init__(self, location: str, gumball_amount: int):
        self.count = gumball_amount
        self.location = location

class GumballMonitor:
    def __init__(self, gumball_machine: GumballMachine):
        self.machine = gumball_machine

    def print_report(self):
        print(f"Gumball Machine Location: {self.machine.location}")
        print(f"Current Inventory: {self.machine.count}")


if __name__ == "__main__":
    machine = GumballMachine("Lincoln", 100)
    monitor = GumballMonitor(machine)

    monitor.print_report()
