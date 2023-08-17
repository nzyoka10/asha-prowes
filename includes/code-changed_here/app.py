class LabourConnectSystem:
    def __init__(self):
        self.workers = []
        self.clients = []
        self.admins = []

    def input_data(self, user_type):
        if user_type == "worker":
            # Collect worker data
            self.workers.append(worker_data)
        elif user_type == "client":
            # Collect client data
            self.clients.append(client_data)

    def validate_users(self):
        # Validation logic for workers and clients

    def activate_accounts(self):
        # Activation logic for accounts

    def admin_validation(self):
        # Admin validation logic

    def match_workers(self, client):
        # Matching logic based on client's geographical area

    def send_reviews(self, user, review):
        # Sending reviews logic

# Example usage
labour_system = LabourConnectSystem()

# User input
labour_system.input_data("worker")
labour_system.input_data("client")

# Validation and activation
labour_system.validate_users()
labour_system.activate_accounts()

# Admin validation
labour_system.admin_validation()

# Matching and reviews
client = labour_system.clients[0]
matched_workers = labour_system.match_workers(client)
labour_system.send_reviews(client, "Great service!")

# Final steps
if labour_system.all_steps_true():
    print("All steps are true. End.")
else:
    print("Not all steps are true. Stop.")
